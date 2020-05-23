<template>
  <div class="media media-none--xs">
    <img :src="comment.avatar" :alt="comment.author_name" class="img-fluid media-img-auto" width="80px">
    <div class="media-body">
      <div class="card-title d-flex justify-content-between">
        <h6 class="item-title">
          <a :href="comment.author_url">{{ comment.author_name }}</a>
        </h6>

        <button
          v-if="comment.can_delete"
          class="close text-danger"
          @click="deleteComment"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <p class="card-text">
        {{ comment.content }}
      </p>
      <p class="card-text">
        <small class="text-muted">{{ comment.time_humanize }}</small>
      </p>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    props: {
      comment: {
        type: Object,
        required: true
      },

      dataConfirm: {
        type: String,
        required: true
      }
    },

    methods: {
      deleteComment () {
        if (confirm(this.dataConfirm)) {
          axios
            .delete(`/api/v1/comments/${this.comment.id}`)
            .then(() => {
              this.$emit('deleted', this)
            })
            .catch(error => {
              console.log(error)
            })
        }
      }
    }
  }
</script>
