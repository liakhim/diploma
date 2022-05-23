<template>
<div class="w-100">
    <div class="filters-wrapper w-100">
        <div class="dropdown-block">
            <div class="dropdown-title">
                <h6>Бюджет</h6>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span v-if="budgetFilter">{{budgetFilter.key}}</span>
                    <span v-else>Выбор бюджета</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-for="filter in budgetFilters">
                        <span class="dropdown-item" @click="chooseBudgetFilter(filter)">{{filter.key}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--********-->
        <div class="dropdown-block">
            <div class="dropdown-title">
                <h6>Настроение</h6>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span v-if="moodFilter">{{moodFilter.name}}</span>
                    <span v-else>Выбор настроения</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-for="filter in moodFilters">
                        <span class="dropdown-item" @click="chooseMoodFilter(filter)">{{filter.name}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--*******-->
        <div class="dropdown-block">
            <div class="dropdown-title">
                <h6>Компания</h6>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                    <span v-if="companyFilter">{{companyFilter.key}}</span>
                    <span v-else>Выбор количества человек</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-for="filter in companyFilters">
                        <span class="dropdown-item" @click="chooseCompanyFilter(filter)">{{filter.key}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--********-->
        <div class="dropdown-block">
            <div class="dropdown-title">
                <h6>Настроение</h6>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                    <span v-if="typeFilter">{{typeFilter.name}}</span>
                    <span v-else>Выбор настроения</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-for="filter in typeFilters">
                        <span class="dropdown-item" @click="chooseTypeFilter(filter)">{{filter.name}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success custom-btn login-register-btn">
            Применить
        </button>
    </div>
</div>
</template>
<script>
    import axios from 'axios';
    export default {
        name: 'Filters',
        data () {
          return {
              filters: [],
              budgetFilter: null,
              budgetFilters: [],
              moodFilter: null,
              moodFilters: [],
              companyFilter: null,
              companyFilters: [],
              typeFilter: null,
              typeFilters: []
          }
        },
        props: ['filters'],
        methods: {
            chooseBudgetFilter (filter) {
                this.budgetFilter = filter
            },
            chooseMoodFilter (filter) {
                this.moodFilter = filter
            },
            chooseCompanyFilter (filter) {
                this.companyFilter = filter
            },
            chooseTypeFilter (filter) {
                this.typeFilter = filter
            }
        },
        mounted() {
            axios.get('/filters').then((response) => {
                this.budgetFilters = response.data.budget_filters
                this.moodFilters = response.data.mood_filters
                this.companyFilter = response.data.company_filters[0]
                this.companyFilters = response.data.company_filters
                this.typeFilters = response.data.type_filters
            })
        }
    }
</script>
