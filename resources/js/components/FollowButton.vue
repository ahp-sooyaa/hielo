<template>
    <div>
        <button
            @click="follow"
            class="btn btn-sm py-0"
            :class="this.isFollowing ? 'btn-info' : 'btn-outline-info'"
            v-text="this.isFollowing ? 'unfollow' : 'follow'"
        >
        </button>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["user"],
    data() {
        return {
            isFollowing: null,
        };
    },
    methods: {
        follow() {
            axios
                .post(`/${this.user.name}/follow`)
                .then((response) => {
                    this.isFollowing = !this.isFollowing;
                })
                .catch((err) => console.log(err.response.data));
        },
        fetchFollows() {
            axios
                .get(`/${this.userName}/follow`)
                .then((response) => {
                    this.isFollowing = response.data.follows.includes(this.user.id)
                })
                .catch(error => console.log(error.response.data));
        }
    },
    created(){
        this.fetchFollows();
    }
};
</script>

<style lang="stylus" scoped></style>