<template>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Posts List</div>

                    <div class="panel-body">
                        <ul v-for="post in posts">
                            <li v-for="pst in post">
                                <a :href="pst.links.url">{{pst.title}}</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
      export default {
        /*
         * The component's data.
         */
        data() {
            return {
                posts: [],

            };
        },


        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component (Vue 2.x).
             */
            prepareComponent() {
                this.getPosts();
            },

            /**
             * Get all of the authorized tokens for the user.
             */
            getPosts() {
                this.$http.get('/api/v1/posts')
                        .then(response => {
                            this.posts = response.data;
                        });
            },

            /**
             * Revoke the given token.
             */
            revoke(post) {
                this.$http.delete('/api/v1/posts' + token.id)
                        .then(response => {
                            this.getPosts();
                        });
            }
        }
    }
</script>
