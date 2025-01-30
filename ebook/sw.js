const cacheName = "ebook-store-v1";
const assets = [
    "/login.php",
    "/bootstrap/bootstrap.css",
    "/css/style.css",
    "/bootstrap/jquery.js",
    "/bootstrap/bootstrap.js",
    "/icons/icon-192x192.png",
    "/icons/icon-512x512.png"
];

self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(cacheName).then(cache => {
            return cache.addAll(assets);
        })
    );
});

self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request).then(response => {
            return response || fetch(event.request);
        })
    );
});
