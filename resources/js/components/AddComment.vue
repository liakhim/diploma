<template>
    <div>
        <button @click="showForm = true" class="btn btn-success">Добавить отзыв</button>
        <div v-if="showForm" class="place-page-comments-add mt-2">
            <form>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Заголовок</label>
                    <input v-model="title" type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12 mt-1">
                    <label for="rating">Оценка</label>
                    <select id="rating" v-model="rating" class="form-select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-12 mt-1">
                    <label for="description" class="form-label">Текст отзыва</label>
                    <textarea v-model="description" class="form-control" id="description" rows="3"></textarea>
                </div>
                <div class="col-12 mt-1">
                    <label for="address" class="form-label">Подпись:</label>
                    <input v-model="sign" type="text" class="form-control" id="address" placeholder="1234 Main St">
                </div>
                <button @click="sendComment()" type="button" class="btn btn-info mt-2">
                    <span class="text-white">Отправить</span>
                </button>
            </form>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        name: 'AddComment',
        data () {
            return {
                showForm: false,
                title: '',
                rating: 1,
                description: '',
                sign: ''
            }
        },
        props: ['location_id'],
        methods: {
            sendComment () {
                const data = {
                    location_id: Number(this.location_id),
                    title: this.title,
                    rating: this.rating,
                    body: this.description,
                    sign: this.sign
                }
                axios.post('/comment/create', data)
                    .then((response) => {
                        alert('complete')
                    })
            }
        }
    }
</script>
<style lang="scss">
    .place-page-comments-add {
        border-right: 5px;;
        padding: 15px;
        box-shadow: 0 0 10px rgb(0 0 0 / 19%);
    }
</style>
