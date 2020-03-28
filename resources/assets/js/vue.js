import CommentForm from '../../js/components/comments/CommentForm'
import CommentList from '../../js/components/comments/CommentList'
import Like from '../../js/components/Like'
import Vue from 'vue'

Vue.config.productionTip = false

window.Event = new Vue()

new Vue({
  el: '#app',

  components: {
    CommentForm,
    CommentList,
    Like
  },

  mounted () {
    $('[data-confirm]').on('click', () => {
      return confirm($(this).data('confirm'))
    })
  }
})
