<template>
  <div
    v-if="show"
    class="alert alert-success position"
    role="alert"
  >
    {{ body }}
  </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            required: true
        }
    },

    data(){
        return {
            body: '',
            show: false
        }
    },

    created(){
        if(this.message){
            this.flash(this.message)
        }

        window.events.$on('flash' , message => this.flash(message) )
    },

    methods: {
        flash(message){
            this.body = message
            this.show = true

            this.hide()
        },
             
        hide(){
            setTimeout(() => {
                this.show = false
            }, 3000)
        }
    }
}
</script>

<style lang="scss" scoped>
    .position{
        position: fixed;
        bottom: 0;
        right: 20px;
    }
</style>