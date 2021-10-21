<template>
    <div class="bloc-modale" v-if="revele">

        <div class="overlay" v-on:click="toggleModale"></div>

        <div class="modale card">
            <div class="btn-modale btn btn-danger" v-on:click="toggleModale">X</div>
            <h2>{{cocktail.strDrink}}</h2>
            <img :src="cocktail.strDrinkThumb" width="150px" height="150px" />
            <br />
            <h3>Cocktail : {{ cocktail.strAlcoholic }}</h3>
            <br />
            <h4>Instructions</h4>
            {{ cocktail.strInstructions}}
            <br/>
            <h5>Ingredients</h5>
            {{ cocktail.strIngredient1}}-
            {{ cocktail.strIngredient2}}-
            {{ cocktail.strIngredient3}}-
            {{ cocktail.strIngredient4}}-
            {{ cocktail.strIngredient5}}-
            {{ cocktail.strIngredient6}}-
        </div>
    </div>
</template>

<script>
    export default {
        name: 'detailsCocktail',
        props: ['revele', 'toggleModale', 'cocktail']
    }
</script>
<style scoped>
.bloc-modale{
    position: fixed;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.overlay {
    background: rgba(0,0,0,0.7);
    position: fixed;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
}

.modale {
    background: #f1f1f1;
    color:#333;
    padding: 50px;
    position: fixed;
}

.btn-modale {
    position: absolute;
    top: 10px;
    left: 10px;
}
</style>