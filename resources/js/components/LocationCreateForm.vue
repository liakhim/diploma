<template>
    <div class="container">
        <form class="row g-3">
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Название места</label>
                <input v-model="name" type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-12">
                <select v-model="group_id" id="group_id" class="form-select">
                    <option>1</option>
                    <option>2</option>
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
              name: 'saxsa',
              group_id: 1,
              address: 'dcsa',
              description: 'xasxcec',
              concept: 'dscdcs',
              tag: 'cdscdscsd',
              min_guest_quantity: 2,
              max_guest_quantity: 5,
              budget: 1300,
              time_open: 10,
              time_close: 22,
              phone: '89999999999'
          }
        },
        methods: {
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
                axios.post('/admin/places/create', data)
                    .then((response) => {

                    })
            }
        }
    }
</script>
