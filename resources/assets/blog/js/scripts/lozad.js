/*
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/17/20, 2:54 PM
 *  @name          lozad.js
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */
// import lozad from 'lozad'
//
// const el = document.querySelector('img');
// const observer = lozad(el);
// // passing a `NodeList` (e.g. `document.querySelectorAll()`) is also valid
// observer.observe();

if ('loading' in HTMLImageElement.prototype) {
  const images = document.querySelectorAll("img");
  images.forEach(img => {
    img.src = img.dataset.src;
  });
} else {
  // Dynamically import the LazySizes library
  let script = document.createElement("script");
  script.async = true;
  script.src =
    "https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.1.8/lazysizes.min.js";
  document.body.appendChild(script);
}
