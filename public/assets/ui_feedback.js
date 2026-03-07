(function () {
    if (window.appNotify && typeof window.appNotify === 'function') {
        return;
    }

    var toast = null;
    var timer = 0;

    function ensureToast() {
        if (toast && toast.parentNode) {
            return toast;
        }
        toast = document.createElement('div');
        toast.id = 'globalUiToast';
        toast.className = 'ui-toast hidden';
        toast.setAttribute('role', 'status');
        toast.setAttribute('aria-live', 'polite');
        document.body.appendChild(toast);
        return toast;
    }

    function hide() {
        var node = ensureToast();
        node.classList.add('hidden');
        node.textContent = '';
        node.classList.remove('is-success', 'is-error', 'is-info');
    }

    function notify(message, type) {
        var text = String(message || '').trim();
        if (!text) {
            return;
        }
        var node = ensureToast();
        node.textContent = text;
        node.classList.remove('hidden', 'is-success', 'is-error', 'is-info');
        if (type === 'error') {
            node.classList.add('is-error');
        } else if (type === 'success') {
            node.classList.add('is-success');
        } else {
            node.classList.add('is-info');
        }

        if (timer) {
            window.clearTimeout(timer);
        }
        timer = window.setTimeout(function () {
            hide();
            timer = 0;
        }, 3200);
    }

    window.appNotify = notify;
})();
