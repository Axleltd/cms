<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload Image</div>

                    <div class="panel-body">
                         <vue-core-image-upload
                          v-bind:class="['btn','btn-primary','js-btn-crop']"
                          v-bind:crop="true" url="file"
                          extensions="png,gif,jpeg,jpg"
                          v-on:imageuploaded="imageuploaded">
                        </vue-core-image-upload>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var vueUpload = require('vue-core-image-upload');

    export default {
        mounted() {
            console.log('Component ready.')
        },

        data() {
            return {
                name: 'Jiraiya',
                src: 'http://img1.vued.vanthink.cn/vued0a233185b6027244f9d43e653227439a.png',
                cropSrc: 'http://img1.vued.vanthink.cn/vued7553a09a5d5209ebd00a48264394b7f3.png',
                cropArgs: {},
            };
        },
        components: {
            'vue-core-image-upload': vueUpload
        },
          methods: {

                imageuploaded(res) {
                  if (res.errcode == 0) {
                    if(res.data.src) {
                      this.src = res.data.src;
                      return;
                    }
                    this.name = res.data.name;
                    this.cropArgs = {
                      toCropImgH: parseInt(res.data.post.toCropImgH),
                      toCropImgW: parseInt(res.data.post.toCropImgW),
                      toCropImgX: parseInt(res.data.post.toCropImgX),
                      toCropImgY: parseInt(res.data.post.toCropImgY)
                    }
                    this.cropSrc = 'https://forum-archive.vuejs.org/uploads/system/site-logo.png';


                  }
                }
          },
          events: {
            imageuploaded(res) {
              if (res.errcode == 0) {
                this.src = 'https://forum-archive.vuejs.org/uploads/system/site-logo.png';
              }
            }
          },
    }
</script>

