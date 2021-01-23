<template>
    <div>
        <div v-for="category in this.categories">
            <h4>{{ category.category_name }}</h4>
            <ul>
                <li v-for="sub_category in category.sub_categories">
                    {{ sub_category.subcategory_name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categories'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
