<template>
    <div class="container">

        <form @submit.prevent="saveData" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input v-model="form.name" type="text" name="name">
            </div>

            <div class="col-md-6">
                <label for="recipe" class="form-label">Recipe</label>
                <textarea v-model="form.recipe" type="text" name="recipe"/>
            </div>
           
            <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" v-on:change="Upload">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">New Recipe</button>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Recipe</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cocktail in cocktails" :key="cocktail.id">
                            <td>{{cocktail.id}}</td>
                            <td><span v-if="editmode == false || editmode != cocktail.id">{{cocktail.name}}</span><input v-if="editmode == cocktail.id" v-model="cocktail.name" type="text"></td>
                            <td><span v-if="editmode == false || editmode != cocktail.id">{{cocktail.recipe}}</span><input v-if="editmode == cocktail.id" v-model="cocktail.recipe" type="text"></td>
                            <td><img :src="'./images/'+cocktail.image" height="80"></td>
                            <td>{{cocktail.created_at}}</td>
                            <td>
                                <div class="btn-group" role="group" >
                                    <div class="d-flex align-items-center">
                                        <button class="btn" v-on:click="editmode = cocktail.id"  v-if="editmode != cocktail.id"><img :src="'./images/Edit.png'" style="width:1.5em"></button> 
                                        <button class="btn" v-if="editmode == cocktail.id" v-on:click="updateCocktail(cocktail)"><img :src="'./images/Editv.png'" style="width:1.5em"></button> 
                                        <button class="btn" @click="deleteCocktail(cocktail.id)"><img :src="'/images/Delete.png'" style="width:1.5em"></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>                        
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                cocktails:[],
                editmode: false,
                form: new Form({
                    id:'',
                    name:'',
                    recipe:'',
                    image:'',
                })  
            }
        },

        methods:
        {
            deleteCocktail(id){
                if(confirm("Are you sure to delete this cocktail ?")){
                    axios.delete(`cocktail_delete/${id}`)
                    .then(response=>{
                        let index = this.cocktails.findIndex(cocktail => cocktail.id === id);
                        this.cocktails.splice(index, 1);
                        this.getCocktail()
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            },
            
            updateCocktail(cocktail){
                this.editmode = false
                var data = new FormData();
                data.append('name', cocktail.name);
                data.append('recipe', cocktail.recipe);

                axios.post(`cocktail_update/${cocktail.id}`, data)
                .then((res)=>{
                    this.getCocktail()
                })
                .catch((error) => {
                   
                })
            },

            getCocktail(){
                axios.get('cocktails')
                .then((res) =>{
                    this.cocktails = res.data
                })
                .catch((error) =>{
                    console.log(error)
                })
            },

            Upload(e){
                this.form.image = e.target.files[0];
            },

            saveData(){
                var data = new FormData();
                data.append('name', this.form.name);
                data.append('recipe', this.form.recipe);
                data.append('image', this.form.image);
                
                axios.post('cocktails', data)
                .then((res)=>{
                    this.form.reset()
                    this.getCocktail()
                })
                .catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
            }
        },

        mounted() {
            this.getCocktail()
        }
    }
</script>