<template>
    <div>
        <i @click="testFunction" :class="[favorited ? 'fas fa-heart' : 'far fa-heart']" v-text="test"></i>
        <p>{{curuser}}</p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            axios.get('api/favorite', {
                params: {
                    curUser: this.$props.curuser
                }
            })
                .then(response => {
                    console.log(response);
                })
        },
        methods: {
            testFunction: function (event) {
                if(this.favorited == false) {
                    this.favorited = true;
                } else {
                    this.favorited = false;
                }

            }
        },


        data: function (){
            return {
                test: null,
                favorited: false,
            }
        },

        props: [
            'curuser',
        ]
    }
</script>

<style>
    .fa-heart{
        color: red;
    }
</style>
