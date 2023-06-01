const CACHE_NAME = "weather-app-cache-v1";
const urlsToCache = [
  "/",
  "./index.php",
  "./index2.php",
  "./fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap",
  "./source.unsplash.com/1600x900/?${data.name}",
  "./cloudy.png",
  "./humidity.png",
  "./icon.png",
  "./pressure.png",
  "./sun.png",
  "./wall4.png",
  "./wind.png",
  "./script.js",
  "https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=2c4794b819ef45030c24d05cc15edb4a"
];

self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        console.log("Opened cache");
        return cache.addAll(urlsToCache);
      })
      .catch((error) => {
        console.error('Failed to add resources to cache', error);
      })
  );
});
self.addEventListener("fetch", (event) => {
  console.log(`Fetching: ${event.request.url}`);
  
  event.respondWith(
    caches.match(event.request).then((response) => {
      if (response) {
        console.log(`Returning cached response for: ${event.request.url}`);
        return response;
      }

      console.log(`Cache miss. Fetching from network: ${event.request.url}`);
      return fetch(event.request).then((response) => {
        if (!response || response.status !== 200 || response.type !== "basic") {
          console.log(`Unable to fetch: ${event.request.url}`);
          return response;
        }

        console.log(`Caching response for: ${event.request.url}`);
        const responseToCache = response.clone();
        caches.open(CACHE_NAME).then((cache) => {
          cache.put(event.request, responseToCache);
        });

        return response;
      });
    })
  );
});