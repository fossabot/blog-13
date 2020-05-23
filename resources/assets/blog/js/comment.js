/*
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/23/20, 10:34 AM
 *  @name          comment.js
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

import CommentForm from './components/comments/CommentForm'
import CommentList from './components/comments/CommentList'
import Like from './components/Like'
import Vue from 'vue'

Vue.config.productionTip = false

window.Event = new Vue()

new Vue({
  el: '#app',

  components: {
    CommentForm,
    CommentList,
    // Like
  },

  mounted () {
    $('[data-confirm]').on('click', () => {
      return confirm($(this).data('confirm'))
    })
  }
})
