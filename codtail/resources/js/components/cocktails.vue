<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" id='search'>
                        <detailsCocktail :revele="revele" :cocktail="cocktail" :toggleModale="toggleModale" ></detailsCocktail>
                        <ul>
                            <li v-for="cocktail in cocktails.drinks" :key="cocktail.idDrink">
                                {{ cocktail.strDrink }}
                                <br />
                                <div v-on:click="toggleModale" class="btn btn-success">
                                    <img :src="cocktail.strDrinkThumb" width="150px" height="150px" v-on:click="datasCocktail(cocktail)" />
                                </div>
                                <br />
                            </li>
                        </ul>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import detailsCocktail from './detailsCocktail'
    export default {
        components: {
            'detailsCocktail': detailsCocktail
        },
        props: ['cocktails'],

        data() {
            return {
                revele :false,
                cocktail: ''
            }
        },

        methods: {
            toggleModale: function() {
                this.revele=!this.revele
            },

            datasCocktail: function(cocktail) {
                this.cocktail=cocktail,
                console.log(this.cocktail)
            }
        }
    }
</script>
<style scoped>
</style>