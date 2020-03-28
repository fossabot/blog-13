<template>
  <div>
    <title-bar :title-stack="['Admin', 'Users']"/>
    <hero-bar>
      Users
      <router-link to="/users/new" class="button" slot="right">
        New User
      </router-link>
    </hero-bar>
    <section class="section is-main-section">
      <card-component class="has-table has-mobile-sort-spaced" title="Users" icon="account-multiple">
        <card-toolbar>
          <button slot="right" type="button" class="button is-danger is-small has-checked-rows-number" @click="trashModal(null)" :disabled="!checkedRows.length">
            <b-icon icon="trash-can" custom-size="default"/>
            <span>Delete</span>
            <span v-show="!!checkedRows.length">({{ checkedRows.length }})</span>
          </button>
        </card-toolbar>
        <modal-trash-box :is-active="isModalActive" :trash-subject="trashSubject" @confirm="trashConfirm" @cancel="trashCancel"/>

        <b-table
          :checked-rows.sync="checkedRows"
          :checkable="true"
          :loading="isLoading"
          :paginated="paginated"
          :per-page="perPage"
          :striped="true"
          :hoverable="true"
          default-sort="name"
          :data="users">

          <template slot-scope="props">
            <b-table-column class="has-no-head-mobile is-image-cell">
              <div v-if="props.row.avatar" class="image">
                <img :src="props.row.avatar" class="is-rounded">
              </div>
            </b-table-column>
            <b-table-column label="Name" field="name" sortable>
              {{ props.row.name }}
            </b-table-column>
            <b-table-column label="Comment Counts" field="comments_count" sortable>
                <progress class="progress is-small is-primary" :value="props.row.comments_count" max="10">{{ props.row.comments_count }}</progress>
            </b-table-column>
            <b-table-column label="Post Counts" field="posts_count" sortable>
                <progress class="progress is-small is-primary" :value="props.row.posts_count" max="10">{{ props.row.posts_count }}</progress>
            </b-table-column>
            <b-table-column label="Registered At">
              <b-tooltip v-bind:label="props.row.registered_at">
                <small class="has-text-grey is-abbr-like" :title="props.row.time_humanize">{{ props.row.time_humanize }}</small>
              </b-tooltip>
            </b-table-column>
            <b-table-column custom-key="actions" class="is-actions-cell">
              <div class="buttons is-right">
                <router-link :to="{name:'users.edit', params: {id: props.row.id}}" class="button is-small is-primary">
                  <b-icon icon="account-edit" size="is-small"/>
                </router-link>
                <button class="button is-small is-danger" type="button" @click.prevent="trashModal(props.row)">
                  <b-icon icon="trash-can" size="is-small"/>
                </button>
              </div>
            </b-table-column>
          </template>

          <section class="section" slot="empty">
            <div class="content has-text-grey has-text-centered">
              <template v-if="isLoading">
                <p>
                  <b-icon icon="dots-horizontal" size="is-large"/>
                </p>
                <p>Fetching data...</p>
              </template>
              <template v-else>
                <p>
                  <b-icon icon="emoticon-sad" size="is-large"/>
                </p>
                <p>Nothing's here&hellip;</p>
              </template>
            </div>
          </section>
        </b-table>
      </card-component>
    </section>
  </div>

</template>

<script>
import map from 'lodash/map'
import CardComponent from './../../components/CardComponent'
import ModalBox from './../../components/ModalBox'
import TitleBar from './../../components/TitleBar'
import HeroBar from './../../components/HeroBar'
import CardToolbar from './../../components/CardToolbar'
import ModalTrashBox from './../../components/ModalTrashBox'
export default {
  name: "UsersIndex",
  components: {ModalTrashBox, CardToolbar, HeroBar, TitleBar, ModalBox, CardComponent},
  data () {
    return {
      isModalActive: false,
      trashObject: null,
      users: [],
      isLoading: false,
      paginated: false,
      perPage: 10,
      checkedRows: []
    }
  },
  computed: {
    trashSubject () {
      if (this.trashObject) {
        return this.trashObject.name
      }

      if (this.checkedRows.length) {
        return `${this.checkedRows.length} entries`
      }

      return null
    }
  },
  created () {
    this.getData()
  },
  methods: {
    getData () {
      this.isLoading = true
      axios
        .get('/api/v1/users')
        .then(r => {
          this.isLoading = false
          if (r.data && r.data.data) {
            if (r.data.data.length > this.perPage) {
              this.paginated = true
            }
            this.users = r.data.data
          }
        })
        .catch( err => {
          this.isLoading = false
          this.$buefy.toast.open({
            message: `Error: ${err.message}`,
            type: 'is-danger',
            queue: false
          })
        })
    },
    trashModal (trashObject = null) {
      if (trashObject || this.checkedRows.length) {
        this.trashObject = trashObject
        this.isModalActive = true
      }
    },
    trashConfirm () {
      let url
      let method
      let data = null

      this.isModalActive = false

      if (this.trashObject) {
        method = 'delete'
        url = `/api/v1/users/${this.trashObject.id}/destroy`
      } else if (this.checkedRows.length) {
        method = 'post'
        url = '/api/v1/users/destroy'
        data = {
          ids: map(this.checkedRows, row => row.id)
        }
      }

      axios({
        method,
        url,
        data
      }).then( r => {
        this.getData()

        this.trashObject = null
        this.checkedRows = []

        this.$buefy.snackbar.open({
          message: `Deleted`,
          queue: false
        })
      }).catch( err => {
        this.$buefy.toast.open({
          message: `Error: ${err.message}`,
          type: 'is-danger',
          queue: false
        })
      })
    },
    trashCancel () {
      this.isModalActive = false
    }
  }
}
</script>
