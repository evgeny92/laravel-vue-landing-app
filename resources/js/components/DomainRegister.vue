<template>
    <div>
        <form method="post" enctype="multipart/form-data" @submit.prevent="submitDomain">
            <div class="form-group">
                <label for="category_id">Select a category</label>
                <select class="form-control" id="category_id" v-model="form.category_id">
                    <option v-for="category in this.categories" v-bind:value="category.id">{{ category.category_name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory_id">Select a subcategory</label>
                <select class="form-control" id="subcategory_id" v-model="form.subcategory_id">
                    <option v-for="subcategory in filteredSubcategories" v-bind:value="subcategory.id">{{ subcategory.subcategory_name }}</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" id="email"
                           v-bind:class="{'is-invalid' : form.errors.has('email')}"
                           class="form-control"
                           placeholder="Please enter your e-mail address"
                           v-model="form.email"
                           v-on:keydown="form.errors.clear('email')">
                    <div class="invalid-feedback" v-show="form.errors.has('email')" v-text="form.errors.get('email')"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="url">Enter your Domain URL</label>
                    <input type="text" id="url"
                           v-bind:class="{'is-invalid' : form.errors.has('url')}"
                           class="form-control"
                           placeholder="https://laravel.com"
                           v-model="form.url"
                           v-on:keydown="form.errors.clear('url')">
                    <div class="invalid-feedback" v-show="form.errors.has('url')" v-text="form.errors.get('url')"></div>
                </div>
            </div>
            <div class="input-group md-3">
                <input type="file" id="img" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Title Domain</label>
                <input type="text" id="title"
                       v-bind:class="{'is-invalid' : form.errors.has('title')}"
                       class="form-control"
                       v-model="form.title"
                       v-on:keydown="form.errors.clear('title')">
                <div class="invalid-feedback" v-show="form.errors.has('title')" v-text="form.errors.get('title')"></div>
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" id="short_description"
                       v-bind:class="{'is-invalid' : form.errors.has('short_description')}"
                       class="form-control"
                       v-model="form.short_description"
                       v-on:keydown="form.errors.clear('short_description')">
                <div class="invalid-feedback" v-show="form.errors.has('short_description')" v-text="form.errors.get('short_description')"></div>

            </div>
            <div class="form-group">
                <vue-editor v-model="form.description"/>
            </div>
            <button class="btn btn-success">Create Domain</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "domain-register",
        props: ['categories', 'subcategories'],
        data(){
            return{
                form: new Form({
                    email: '',
                    title: '',
                    url: '',
                    short_description: '',
                    description: '',
                    category_id: 1,
                    subcategory_id: ''
                })
            }
        },
        methods: {
          submitDomain(){
              let data = new FormData();
              data.append('title', this.form.title);
              data.append('email', this.form.email);
              data.append('url', this.form.url);
              data.append('short_description', this.form.short_description);
              data.append('description', this.form.description);
              data.append('category_id', this.form.category_id);
              data.append('subcategory_id', this.form.subcategory_id);
              if(document.getElementById('img').files[0]){
                  data.append('img', document.getElementById('img').files[0]);
              }

              axios.post('/domain', data)
                  .then((response) => {
                      this.form.reset();
                  })
                  .catch(error => this.form.errors.record(error.response.data))
          }
        },
        computed: {
            filteredSubcategories: function () {
                return this.subcategories.filter((item) => item.category_id == this.form.category_id);
            }
        }
    }
</script>

<style scoped>

</style>