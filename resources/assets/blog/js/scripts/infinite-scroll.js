import InfiniteScroll from "infinite-scroll"

var elem = document.querySelector('.container');
var infScroll = new InfiniteScroll( elem, {
  // options
  path: '.pagination__next',
  append: '.post',
  history: false,
});
