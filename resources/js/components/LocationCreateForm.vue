<template>
    <div class="container">
        <input v-on:change="handleFileUpload()" ref="file" name="myFile" type="file">
        <div class="preview-image">
            <img v-bind:src="imagePreview" v-show="showPreview"/>
        </div>
        <form class="row g-3">
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Название места</label>
                <input v-model="name" type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Группа места</label>
                <select v-model="group_id" id="group_id" class="form-select">
                    <option value="1">1 (Еда)</option>
                    <option value="2">2 (Город)</option>
                    <option value="3">3 (Активный отдых)</option>
                    <option value="4">4 (Культурный отдых)</option>
                </select>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Адрес:</label>
                <input v-model="address" type="text" class="form-control" id="address" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Описание</label>
                <textarea v-model="description" class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="col-12">
                <label for="concept" class="form-label">Вид отдыха</label>
                <select v-model="concept" id="concept" class="form-select">
                    <option selected>Активный отдых</option>
                    <option>Культурный отдых</option>
                    <option>Развлечение</option>
                </select>
            </div>
            <div class="col-12">
                <label for="mood" class="form-label">Настроение</label>
                <select v-model="tag" id="mood" class="form-select">
                    <option selected>Грустное</option>
                    <option>Радостное</option>
                    <option>Праздничное</option>
                    <option>Романтическое</option>
                    <option>Расслабленное</option>
                </select>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <label for="minGuest" class="form-label">Мин гостей</label>
                        <input v-model="min_guest_quantity" id="minGuest" class="form-control" type="number">
                    </div>
                    <div class="col-3">
                        <label for="maxGuest" class="form-label">Макс гостей</label>
                        <input v-model="max_guest_quantity" id="maxGuest" class="form-control" type="number">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <label for="budget" class="form-label">Бюджет</label>
                        <input v-model="budget" id="budget" class="form-control" type="number">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <label for="openTime" class="form-label">Час открытия</label>
                        <input v-model="time_open" id="openTime" class="form-control" type="number">
                    </div>
                    <div class="col-3">
                        <label for="closeTime" class="form-label">Час закрытия</label>
                        <input v-model="time_close" id="closeTime" class="form-control" type="number">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <label for="phone" class="form-label">Телефон</label>
                        <input v-model="phone" id="phone" class="form-control" type="phone">
                    </div>
                </div>
            </div>
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
              name: '',
              group_id: 1,
              address: '',
              description: '',
              concept: '',
              tag: '',
              min_guest_quantity: 0,
              max_guest_quantity: 0,
              budget: 0,
              time_open: 0,
              time_close: 0,
              phone: '',
              file: '',
              imagePreview: '',
              showPreview: false
          }
        },
        props: ['initData'],
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
                    name: this.name,
                    group_id: this.group_id,
                    address: this.address,
                    description: this.description,
                    concept: this.concept,
                    tag: this.tag,
                    min_guest_quantity: this.min_guest_quantity,
                    max_guest_quantity: this.max_guest_quantity,
                    budget: this.budget,
                    time_open: this.time_open,
                    time_close: this.time_close,
                    phone: this.phone
                }
                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('name', this.name);
                formData.append('group_id', this.group_id);
                formData.append('address', this.address);
                formData.append('description', this.description);
                formData.append('concept', this.concept);
                formData.append('tag', this.tag);
                formData.append('min_guest_quantity', this.min_guest_quantity);
                formData.append('max_guest_quantity', this.max_guest_quantity);
                formData.append('budget', this.budget);
                formData.append('time_open', this.time_open);
                formData.append('time_close', this.time_close);
                formData.append('phone', this.phone);

                axios.post('/admin/places/create', formData, {headers: {
                        'Content-Type': 'multipart/form-data'
                    }})
                    .then((response) => {
                        document.location.replace('/admin/places/');
                    })
            }
        },
        mounted () {
            if (!!this.initData) {
                this.initData = JSON.parse(this.initData)
                this.name = this.initData.name
                this.group_id = this.initData.id
                this.address = this.initData.address
                this.description = this.initData.description
                this.concept = this.initData.concept
                this.tag = this.initData.tag
                this.min_guest_quantity = this.initData.min_guest_quantity
                this.max_guest_quantity = this.initData.max_guest_quantity
                this.budget = this.initData.budget
                this.time_open = this.initData.time_open
                this.time_close = this.initData.time_close
                this.phone = this.initData.phone
            }
        }
    }
</script>
<style lang="scss">
    .preview-image {
        width: 400px;
        img {
            width: 100%;
        }
    }
</style>
