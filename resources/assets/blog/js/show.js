/*
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/17/20, 3:31 PM
 *  @name          show.js
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

// import hljs from 'highlight.js';
import JSShare from "js-share";
import 'highlight.js/styles/github.css';

document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
  });
});

const shareItems = document.querySelectorAll('.social_share');
for (let i = 0; i < shareItems.length; i += 1) {
  shareItems[i].addEventListener('click', function share(e) {
    return JSShare.go(this);
  });
}


