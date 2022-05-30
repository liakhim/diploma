<template>
    <div class="container">
        <div class="places-sort-filter mt-3 d-flex align-items-center">
            <label for="rating">Сортировать по рейтингу:</label>
            <select @change="changeSort($event)" name="rating" id="rating">
                <option :selected="ratingSort === 'asc'" value="asc">По возрастанию</option>
                <option :selected="ratingSort === 'desc'" value="desc">По убыванию</option>
            </select>
        </div>
        <div class="places-wrapper pt-4 pb-4">
            <a v-for="place in local_places" :href="'places/' + place.id" class="place-card">
                <div class="place-card-image">
                    <img :src="'/storage/locations/' + place.image_url" alt="">
                </div>
                <div class="stars">
                    <span v-for="n in 5" class="material-symbols-outlined"
                          :class="{'green': place.rating > n - 1}">star</span>
                </div>
                <div class="place-card-title">
                    <h4>{{place.name}}</h4>
                    <p>{{place.description}}</p>
                </div>
            </a>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'LocationList',
        props: ['places'],
        data () {
            return {
                ratingSort: '',
                local_places: []
            }
        },
        methods: {
          changeSort (ev) {
              console.log(ev.target.value)
              document.location.href = String(document.location).split('&')[0] + '&sort=' + ev.target.value
          }
        },
        mounted () {
            let params = (new URL(document.location)).searchParams;
            this.ratingSort = params.get("sort")
            this.local_places = JSON.parse(this.places)
        }
    }
</script>
<style lang="scss">
    .stars {
        span {
            color: rgba(0,0,0,.55);
        }
        span.green {
            color: #3b8755;
        }
    }
</style>
