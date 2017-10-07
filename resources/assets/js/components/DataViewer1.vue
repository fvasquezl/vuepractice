<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="panel-title">{{title}}</span>
            <div>
                <router-link to="create" class="btn btn-primary btn-sm">Create</router-link>
                <button class="btn btn-default btn-sm" @click="showFilter = !showFilter">F</button>
            </div>
        </div>
        <div class="panel-body">
            <div class="filter" v-if="showFilter">
                <div class="filter-colum">
                    <select class="form-control" v-model="params.search_column">
                        <option v-for="column in filter" :value="column">{{column}}</option>
                    </select>
                </div>
                <div class="filter-operator">
                    <select class="form-control" v-model="params.search_operator">
                        <option v-for="(value,key) in operators" :value="key">{{value}}</option>
                    </select>
                </div>
                <div class="filter-input">
                    <input type="text" class="form-control" v-model="params.search_query_1"
                    @keyup.enter="fetchData" placeholder="search"/>
                </div>
                <div class="filter-input" v-if="params.search_operator === 'between'">
                    <input type="text" class="form-control" v-model="params.search_query_2"
                           @keyup.enter="fetchData" placeholder="search"/>
                </div>
                <div class="filter-btn">
                    <button class="btn btn-primary btn-sm btn-block">Filter</button>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th v-for="item in thead">
                        <div class="dataviewer-th" @click="sort(item.key)" v-if="item.sort">
                            <span>{{item.title}}</span>
                            <span v-if="params.colum===item.key">
                                <span v-if="params.direction ==='asc'">&#x25B2;</span>
                                <span v-else>&#x25BC;</span>
                            </span>
                        </div>
                        <div v-else>
                            <span>{{item.title}}</span>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                    <slot v-for="item in model.data" :item="item"></slot>
                </tbody>
            </table>
        </div>
        <div class="panel-footer pagination-footer">
            <div class="pagination-item">
                <span>Per page:</span>
                <select v-model="params.per_page" @change="fetchData">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>
            <div class="pagination-item">
                <small>Showing {{model.from}} - {{model.to}} of {{model.total}}</small>
            </div>
            <div class="pagination-item">
                <small>Current page:</small>
                <input type="text" class="pagination-input" v-model="params.page" @keyup.enter="fetchData"/>
                <small> of {{model.last_page}}</small>
            </div>
            <div class="pagination-item">
                <button @click="next" class="btn btn-default btn-sm">Prev</button>
                <button @click="prev" class="btn btn-default btn-sm">Next</button>
            </div>
        </div>
    </div>
</template>

<script>
    
</script>