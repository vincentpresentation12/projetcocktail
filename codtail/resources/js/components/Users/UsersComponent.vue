<template>
    <div class="container">

        <form @submit.prevent="saveData">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input v-model="form.name" :class="{'is-invalid' : form.errors.has('name')}" type="text" name="name" @keydown="form.errors.clear('name')">
            </div>

            <span class="text-danger pt-3 pb-3" style="font-size:1em;" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
            
            <div class="col-md-6">
                <label for="name" class="form-label">Nickname</label>
                <input v-model="form.nickname" :class="{'is-invalid' : form.errors.has('nickname')}" type="text" name="nickname" @keydown="form.errors.clear('nickname')">
            </div>

            <span class="text-danger pt-3 pb-3" style="font-size:1em;" v-if="form.errors.has('nickname')" v-text="form.errors.get('nickname')"></span>
           
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input v-model="form.email" :class="{'is-invalid' : form.errors.has('email')}" type="email" name="email" @keydown="form.errors.clear('email')">
            </div>

            <span class="text-danger pt-3 pb-3" style="font-size:1em;" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
            
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input v-model="form.password" :class="{'is-invalid' : form.errors.has('password')}" type="password" name="password" @keydown="form.errors.clear('password')">
            </div>

            <span class="text-danger pt-3 pb-3" style="font-size:1em;" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">New User</button>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nickname</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{user.id}}</td>
                            <td><span v-if="editmode == false || editmode != user.id">{{user.name}}</span><input v-if="editmode == user.id" v-model="user.name" type="text"></td>
                            <td><span v-if="editmode == false || editmode != user.id">{{user.nickname}}</span><input v-if="editmode == user.id" v-model="user.nickname" type="text"></td>
                            <td><span v-if="editmode == false || editmode != user.id">{{user.email}}</span><input v-if="editmode == user.id" v-model="user.email" type="text"></td>
                            <td><span v-if="editmode == false || editmode != user.id">{{user.admin}}</span><input v-if="editmode == user.id" v-model="user.admin" type="text"></td>
                            <td>{{user.created_at}}</td>
                            <td>
                                <div class="btn-group" role="group" >
                                    <div class="d-flex align-items-center">
                                        <button class="btn" v-on:click="editmode = user.id"  v-if="editmode != user.id"><img :src="'./images/Edit.png'" style="width:1.5em"></button> 
                                        <button class="btn" v-if="editmode == user.id" v-on:click="updateUser(user)"><img :src="'./images/Editv.png'" style="width:1.5em"></button> 
                                        <button class="btn" @click="deleteUser(user.id)"><img :src="'/images/Delete.png'" style="width:1.5em"></button>
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
                users:[],
                editmode: false,
                form: new Form({
                    id:'',
                    name:'',
                    nickname:'',
                    email:'',
                    password:'',
                })  
            }
        },

        methods:
        {
            deleteUser(id){
                if(confirm("Are you sure to delete this user ?")){
                    axios.delete(`user_delete/${id}`)
                    .then(response=>{
                        let index = this.users.findIndex(user => user.id === id);
                        this.users.splice(index, 1);
                        this.getUsers()
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            },
            
            updateUser(user){
                this.editmode = false
                var data = new FormData();
                data.append('name', user.name);
                data.append('nickname', user.nickname);
                data.append('email', user.email);
                data.append('admin', user.admin);

                axios.post(`user_update/${user.id}`, data)
                .then((res)=>{
                    this.getUsers()
                })
                .catch((error) => {
                   
                })
            },

            getUsers(){
                axios.get('users')
                .then((res) =>{
                    this.users = res.data
                })
                .catch((error) =>{
                    console.log(error)
                })
            },

            saveData(){
                console.log(this.form.name)
                var data = new FormData();
                data.append('name', this.form.name);
                data.append('nickname', this.form.nickname);
                data.append('email', this.form.email);
                data.append('password', this.form.password);
                
                axios.post('users', data)
                .then((res)=>{
                    this.form.reset()
                    this.getUsers()
                })
                .catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
            }
        },

        mounted() {
            this.getUsers()
        }
    }
</script>