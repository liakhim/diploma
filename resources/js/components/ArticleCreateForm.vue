<template>
    <div class="container">
        <form class="row g-3">
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
        name: 'LocationCreateForm',
        data () {
          return {
              title: '',
              description: '',
              body: '',
              image_url: 'saca'
          }
        },
        props: ['initData'],
        methods: {
            save () {
                const data = {
                    title: this.title,
                    image_url: this.image_url,
                    description: this.description,
                    body: this.body
                }
                axios.post('/admin/articles/create', data)
                    .then((response) => {})
            }
        },
        mounted () {
            if (!!this.initData) {}
        }
    }
</script>
