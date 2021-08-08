<template>
  <div>
    <i
      class="fa-lg ml-2"
      :class="isLiked ? 'fas fa-heart' : 'far fa-heart'"
      :style="isLoggedIn ? { cursor: 'pointer' } : ''"
      @click="toggleLike"
    >
    {{ count }}
    </i>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: {
    liked: {
      type: Boolean,
      required: true,
    },
    likesCount: {
      type: Number,
      required: true,
    },
    itemId: {
      type: Number,
      required: true,
    },
    loggedIn: {
      type: Boolean,
      required: true,
    },
  },
  data() {
    return {
      isLiked: this.liked,
      isLoggedIn: this.loggedIn,
      count: this.likesCount,
      endpoint: `/posts/${this.itemId}/likes`,
      isLoading: false,
    };
  },
  methods: {
    toggleLike() {
      if (this.isLoggedIn) {
        this.isLoading = true;
        axios
          .post(this.endpoint)
          .then((response) => {
              this.isLoading = false;

              if (this.isLiked) {
                  this.count--;
              } else {
                  this.count++;
              }
              this.isLiked = !this.isLiked;
          })
          .catch(() => {
            this.isLoading = false;
          }); 
      } else {
        flash("Please Sign In to give like!")
      }
    },
  },
};
</script>