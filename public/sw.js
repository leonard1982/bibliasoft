const CACHE_VERSION = 'biblia-soft-v3';
const STATIC_CACHE = `${CACHE_VERSION}-static`;
const RUNTIME_CACHE = `${CACHE_VERSION}-runtime`;

const STATIC_ASSETS = [
  './',
  './?route=home_daily',
  './?route=reader',
  './?route=devotional',
  './?route=share_app',
  './?route=anecdotes',
  './assets/app.css',
  './assets/app.js',
  './assets/daily.js',
  './assets/devotional.js',
  './assets/anecdotes.js',
  './assets/share_app.js',
  './assets/vendor/qrcode.min.js',
  './assets/icons/book.svg',
  './assets/icons/copy.svg',
  './assets/icons/camera.svg',
  './assets/icons/download.svg',
  './assets/icons/help.svg',
  './assets/icons/list.svg',
  './assets/icons/menu.svg',
  './assets/icons/settings.svg',
  './assets/icons/share.svg',
  './assets/icons/text.svg',
  './assets/backgrounds/bg-01.svg',
  './assets/backgrounds/bg-02.svg',
  './assets/backgrounds/bg-03.svg',
  './assets/backgrounds/bg-04.svg',
  './assets/backgrounds/bg-05.svg',
  './manifest.json'
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(STATIC_CACHE).then((cache) => cache.addAll(STATIC_ASSETS))
  );
  self.skipWaiting();
});

self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(
        keys.map((key) => {
          if (!key.startsWith(CACHE_VERSION)) {
            return caches.delete(key);
          }
          return null;
        })
      )
    )
  );
  self.clients.claim();
});

self.addEventListener('fetch', (event) => {
  if (event.request.method !== 'GET') {
    return;
  }

  const url = new URL(event.request.url);
  const isChapterApi = url.searchParams.get('route') === 'api.chapter';
  const isReaderRoute = url.searchParams.get('route') === 'reader';

  if (isChapterApi || isReaderRoute) {
    event.respondWith(networkFirst(event.request));
    return;
  }

  if (url.origin === self.location.origin) {
    event.respondWith(cacheFirst(event.request));
  }
});

async function cacheFirst(request) {
  const cached = await caches.match(request);
  if (cached) {
    return cached;
  }
  const response = await fetch(request);
  const cache = await caches.open(STATIC_CACHE);
  cache.put(request, response.clone());
  return response;
}

async function networkFirst(request) {
  try {
    const response = await fetch(request);
    const cache = await caches.open(RUNTIME_CACHE);
    cache.put(request, response.clone());
    return response;
  } catch (error) {
    const cached = await caches.match(request);
    if (cached) {
      return cached;
    }
    return new Response(JSON.stringify({ error: 'No disponible sin conexión' }), {
      status: 503,
      headers: { 'Content-Type': 'application/json' }
    });
  }
}
