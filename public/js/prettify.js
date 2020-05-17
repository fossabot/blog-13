/*
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/17/20, 3:27 PM
 *  @name          show.js
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

onmessage = (event) => {
  importScripts('//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.0.0/build/highlight.min.js');
  const result = self.hljs.highlightAuto(event.data);
  postMessage(result.value);
};
