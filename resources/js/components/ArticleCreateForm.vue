<template>
    <div class="container">
        <form class="row g-3">
            <div v-if="oldImage.length" class="old-image">
                <p class="mb-3">Текущее изображение:</p>
                <img :src="'/storage/articles/' + oldImage" alt="">
            </div>
            <input v-on:change="handleFileUpload()" ref="file" name="myFile" type="file">
            <div v-if="showPreview" class="preview-image">
                <p class="mb-3">Загружаемое изображение:</p>
                <img v-bind:src="imagePreview" alt=""/>
            </div>
            <div class="col-12">
                <label for="title" class="form-label">Название</label>
                <input v-model="title" type="text" class="form-control" id="title">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Описание (превью):</label>
                <input v-model="description" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="body" class="form-label">Текст статьи</label>
                <textarea v-model="body" class="form-control" id="body" rows="3"></textarea>
            </div>
<!--            <div class="col-12">-->
<!--                <label for="inputState" class="form-label">Видимость</label>-->
<!--                <select id="inputState" class="form-select">-->
<!--                    <option selected>Видимая</option>-->
<!--                    <option>Скрытая</option>-->
<!--                </select>-->
<!--            </div>-->
            <div class="col-12 d-flex justify-content-end">
                <button @click="save()" type="button" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        name: 'ArticleCreateForm',
        data () {
          return {
              oldImage: '',
              title: '',
              description: '',
              body: '',
              image_url: 'saca',
              file: '',
              imagePreview: '',
              showPreview: false
          }
        },
        props: ['initData', 'article_id'],
        methods: {
            handleFileUpload () {
                this.file = this.$refs.file.files[0];
                let reader  = new FileReader();
                reader.addEventListener("load", function () {
                    this.showPreview = true;
                    this.imagePreview = reader.result;
                }.bind(this), false);
                if( this.file ){
                    if ( /\.(jpe?g|png|gif)$/i.test( this.file.name ) ) {
                        reader.readAsDataURL( this.file );
                    }
                }
            },
            save () {
                const data = {
                    title: this.title,
                    description: this.description,
                    body: this.body
                }
                let formData = new FormData();
                formData.append('title', this.title);
                formData.append('file', this.file);
                formData.append('description', this.description);
                formData.append('body', this.body);
                if (this.initData) {
                    formData.append('article_id', this.article_id);
                }
                axios.post('/admin/articles/' + (this.initData ? 'edit' : 'create'), formData, {headers: {
                        'Content-Type': 'multipart/form-data'
                    }})
                    .then((response) => {
                        document.location.replace('/admin/articles/');
                    })
            }
        },
        mounted () {
            if (!!this.initData) {
                this.initData = JSON.parse(this.initData)
                this.title = this.initData.title
                this.description = this.initData.description
                this.body = this.initData.body
                this.oldImage = this.initData.image_url
            }
        }
    }
</script>
<style lang="scss">
    .old-image {
        max-width: 500px;
        img {
            width: 100%;
        }
    }
</style>
