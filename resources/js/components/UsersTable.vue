<template>
  <div>
    <modal-trash-box :is-active="isModalActive" :trash-subject="trashObjectName" @confirm="trashConfirm" @cancel="trashCancel"/>
    <b-table
      :checked-rows.sync="checkedRows"
      :checkable="checkable"
      :loading="isLoading"
      :paginated="paginated"
      :per-page="perPage"
      :striped="true"
      :hoverable="true"
      default-sort="name"
      :data="clients">

      <template slot-scope="props">
        <b-table-column class="has-no-head-mobile is-image-cell">
          <div v-if="props.row.avatar" class="image">
            <img :src="props.row.avatar" class="is-rounded">
          </div>
        </b-table-column>
        <b-table-column label="Name" field="name" sortable>
          {{ props.row.name }}
        </b-table-column>
        <b-table-column label="Email" field="email" sortable>
          {{ props.row.email }}
        </b-table-column>
        <b-table-column label="Comment Counts" field="comments_count" sortable>
          <b-tooltip v-bind:label="props.row.comments_count">
            <progress class="progress is-small is-primary" :value="props.row.comments_count" max="10">{{ props.row.comments_count }}</progress>
          </b-tooltip>
        </b-table-column>
        <b-table-column label="Post Counts" field="posts_count" sortable>
          <b-tooltip v-bind:label="props.row.posts_count">
            <progress class="progress is-small is-primary" :value="props.row.posts_count" max="10">{{ props.row.posts_count }}</progress>
          </b-tooltip>
        </b-table-column>
        <b-table-column label="Registered At">
          <b-tooltip v-bind:label="props.row.registered_at">
            <small class="has-text-grey is-abbr-like" :title="props.row.time_humanize">{{ props.row.time_humanize }}</small>
          </b-tooltip>
        </b-table-column>
        <b-table-column custom-key="actions" class="is-actions-cell">
          <div class="buttons is-right">
            <router-link :to="{name:'clients.edit', params: {id: props.row.id}}" class="button is-small is-primary">
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
  </div>
</template>

<script>
  import ModalTrashBox from './ModalTrashBox'

  export default {
    name: 'UsersTable',
    components: { ModalTrashBox },
    props: {
      dataUrl: {
        type: String,
        default: null
      },
      checkable: {
        type: Boolean,
        default: false
      }
    },
    data () {
      return {
        isModalActive: false,
        trashObject: null,
        clients: [],
        isLoading: false,
        paginated: false,
        perPage: 10,
        checkedRows: []
      }
    },
    computed: {
      trashObjectName () {
        if (this.trashObject) {
          return this.trashObject.name
        }

        return null
      }
    },
    created () {
      this.getData()
    },
    methods: {
      getData () {
        if (this.dataUrl) {
          this.isLoading = true
          axios
            .get(this.dataUrl)
            .then(r => {
              this.isLoading = false
              if (r.data && r.data.data) {
                if (r.data.data.length > this.perPage) {
                  this.paginated = true
                }
                this.clients = r.data.data
              }
            })
            .catch( err => {
              this.isLoading = false
              this.$buefy.toast.open({
                message: `Error: ${e.message}`,
                type: 'is-danger',
                queue: false
              })
            })
        }
      },
      trashModal (trashObject) {
        this.trashObject = trashObject
        this.isModalActive = true
      },
      trashConfirm () {
        this.isModalActive = false

        axios
          .delete(`/api/v1/users/${this.trashObject.id}/destroy`)
          .then( r => {
            this.getData()

            this.$buefy.snackbar.open({
              message: `Deleted ${this.trashObject.name}`,
              queue: false
            })
          })
          .catch( err => {
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
