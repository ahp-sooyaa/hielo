<template>
  <div>
    {{ comments.length | pluralize }}
    <div v-if="comments.length">
      <div
        v-for="(comment, index) in comments"
        :key="comment.id"
      >
        <comment
          @deleted="deleteComment(index)"
          :comment="comment"
        />
      </div>
    </div>
    <div
      v-else
      class="text-center my-3"
    >
      No comments Yet!
    </div>
    <comment-form />
  </div>
</template>

<script>
import Comment from './Comment'
export default {
    components: {Comment},

    filters: {
        pluralize(length){
            return length > 1 ? length + ' comments' : length + ' comment'
        }
    },
    props: {
        user: {
            type: Object,
            required: true
        },
        author: {
            type: Object,
            required: true
        }
    },

    data(){
        return{
            comments: [],
            endpoint: `${location.pathname}/comments`,
        }
    },

    mounted() {
        this.fetchComments()
        window.events.$on('created' , comment => this.addComment(comment) )
    },

    methods: {
        fetchComments(){
            window.axios
                .get(this.endpoint)
                .then((response) => {
                    this.comments = response.data
                })
        },
        addComment (comment) {
            this.comments.push(comment)
        },
        deleteComment (index) {
            this.comments.splice(index, 1)
        }
    }
}
</script>