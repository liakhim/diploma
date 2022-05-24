<template>
<div class="filter-page w-100">
    <div class="filters-wrapper w-100">
        <div class="dropdown-block">
            <div class="dropdown-title">
                <h6>Бюджет</h6>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span v-if="budgetFilter">{{budgetFilter.name}}</span>
                    <span v-else>Выбор бюджета</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-for="filter in budgetFilters">
                        <span class="dropdown-item" @click="chooseBudgetFilter(filter)">{{filter.name}}</span>
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
                    <span v-if="companyFilter">{{companyFilter.name}}</span>
                    <span v-else>Выбор количества человек</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-for="filter in companyFilters">
                        <span class="dropdown-item" @click="chooseCompanyFilter(filter)">{{filter.name}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--********-->
        <div class="dropdown-block">
            <div class="dropdown-title">
                <h6>Вид отдыха</h6>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                    <span v-if="typeFilter">{{typeFilter.name}}</span>
                    <span v-else>Выбор вида отдыха</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-for="filter in typeFilters">
                        <span class="dropdown-item" @click="chooseTypeFilter(filter)">{{filter.name}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit"
                :disabled="!budgetFilter || !companyFilter || !moodFilter || !typeFilter"
                @click="redirect()"
                class="btn btn-success custom-btn login-register-btn">
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
        computed: {
          allFilters () {
              return '?filter_budget=' + this.budgetFilter?.key + '&filter_mood=' + this.moodFilter?.key +
                  '&filter_company=' + this.companyFilter?.key + '&filter_type=' + this.typeFilter?.key
          }
        },
        methods: {
            redirect () {
              document.location.replace(String(document.location).split('?')[0] + this.allFilters)
            },
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
                // this.companyFilter = response.data.company_filters[0]
                this.companyFilters = response.data.company_filters
                this.typeFilters = response.data.type_filters
                // ***
                console.log(this.companyFilters)
                let params = (new URL(document.location)).searchParams;
                if (params.get("filter_company")) {
                    this.companyFilter = this.companyFilters.find(v => v.key === params.get("filter_company"))
                } else {
                    this.companyFilter = this.companyFilters[0]
                }
                if (params.get("filter_mood")) {
                    this.moodFilter = this.moodFilters.find(v => v.key === params.get("filter_mood"))
                }
                if (params.get("filter_budget")) {
                    this.budgetFilter = this.budgetFilters.find(v => v.key === params.get("filter_budget"))
                }
                if (params.get("filter_type")) {
                    this.typeFilter = this.typeFilters.find(v => v.key === params.get("filter_type"))
                }
            })
        }
    }
</script>
