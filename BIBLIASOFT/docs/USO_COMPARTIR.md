# USO COMPARTIR

## Compartir versículos
En el lector:
- `Copiar selección`: copia una o varias referencias con texto.
- `Copiar como párrafo`: une el pasaje y añade referencia al final.
- `Compartir`: usa Web Share API en móvil; si no existe, copia el texto.

Formato compartido:
- Texto del versículo/pasaje
- Referencia
- Línea final: `Biblia para todos`

## Crear imagen del versículo
En `Herramientas`:
1. Selecciona uno o más versículos.
2. Elige un fondo en el selector.
3. Elige estilo `Modo oscuro` o `Modo claro`.
4. Pulsa `Crear imagen del versículo`.
5. Opciones:
   - `Descargar PNG`
   - `Compartir`
   - `Copiar imagen`

Si el navegador no permite compartir/copiar imagen:
- se descarga el PNG automáticamente como fallback.

## Versículo del día
En inicio (`?route=home_daily`):
- Botón `Compartir` para enviar el versículo diario.
- Botón `No mostrar más hoy` para ocultar la portada diaria hasta el siguiente día.

## Compartir la app por QR
En `?route=share_app`:
- se genera QR local apuntando a `APP_PUBLIC_URL` (si está configurado),
- botón `Copiar enlace`,
- botón `Compartir`.

## Devocionales
En `Devocionales`:
- `Compartir texto`
- `Crear imagen`
- `Generar otro` crea una nueva entrada y la guarda en historial.
