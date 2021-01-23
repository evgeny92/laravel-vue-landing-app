<template>
    <div class="w-100 mt-5">
        <div class="row">
            <div class="col-12 p-2">
                <div class="category-box w-100 align-items-center py-1" v-on:click="selectedAll()">
                    <h5 class="text-center">Show all links</h5>
                </div>
            </div>
            <div class="p-2 col-4" v-for="category in this.categories">
                <div class="category-box w-100 align-items-center py-1" v-on:click="selectedCat(category.id)">
                    <h5 class="text-center">{{ category.category_name }}</h5>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="p-2 col-4" v-for="subcategory in filteredSubcategories" v-on:click="selectedSubCat(subcategory.id)">
                <div class="subcategory-box w-100 align-items-center py-1">
                    <h6 class="text-center">{{ subcategory.subcategory_name }}</h6>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6 p-2" v-for="domain in filteredDomains">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Website name:</strong> {{ domain.title }}</p>
                        <p><strong>Website URL:</strong> <a v-bind:href="domain.url">{{ domain.url }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "domain-display",
        props: ['domains', 'categories', 'subcategories'],
        data() {
            return {
                selectedCategory: '',
                selectedSubCategory: ''
            }
        },
        methods: {
            selectedCat: function (id) {
                this.selectedCategory = id;
                this.selectedSubCategory = '';
            },
            selectedSubCat: function (id) {
                this.selectedSubCategory = id;
            },
            selectedAll: function () {
                this.selectedCategory = '';
                this.selectedSubCategory = '';
            },
        },
        computed:{
            filteredSubcategories: function () {
                return this.subcategories.filter((item) => item.category_id == this.selectedCategory)
            },
            filteredDomains: function(){
                if(this.selectedCategory === '' && this.selectedSubCategory === ''){
                    return this.domains;
                }else if(this.selectedCategory === '' && this.selectedSubCategory != ''){
                    return this.domains.filter((item) => item.subcategory_id == this.selectedSubCategory)
                }else if(this.selectedCategory != '' && this.selectedSubCategory === ''){
                    return this.domains.filter((item) => item.category_id == this.selectedCategory)
                }else if(this.selectedCategory != '' && this.selectedSubCategory != ''){
                    return this.domains.filter((item) => item.subcategory_id == this.selectedSubCategory)
                }
            }
        }
    }
</script>

<style scoped>

</style>