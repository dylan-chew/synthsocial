<template>
    <div>
        <i v-bind:id="'post'+postid" @click="interactLike" :class="[favorited ? 'fas fa-heart' : 'far fa-heart']"
           v-text="test"></i>
    </div>
</template>

<script>
    export default {
        mounted() {
            //lets get all of the posts that the current user liked so we can display if its a fav or not
            axios.get('/api/favorite', {
                params: {
                    curUserId: this.$props.curuserid
                }
            })
                .then(response => {
                    const likedPosts = response.data
                    likedPosts.forEach(post => {
                        if (post.post_id == this.$props.postid) {
                            this.favorited = true;
                        }
                    })
                })
        },
        methods: {
            interactLike: function (event) {
                if (this.favorited == false) {
                    this.favorited = true;
                    axios.get('/api/favorite/add', {
                        params: {
                            curUserId: this.$props.curuserid,
                            postId: this.$props.postid
                        }
                    })
                        .then(response => {
                            console.log(response.data)
                        })
                } else {
                    this.favorited = false;
                    axios.get('/api/favorite/remove', {
                        params: {
                            curUserId: this.$props.curuserid,
                            postId: this.$props.postid
                        }
                    })
                        .then(response => {
                            console.log(response.data)
                        })
                }

            }
        },


        data: function () {
            return {
                test: null,
                favorited: false,
            }
        },

        props: [
            'curuserid',
            'postid',
        ]
    }
</script>

<style>
    .fa-heart {
        color: red;
    }

    i {
        cursor: pointer;
    }
</style>
