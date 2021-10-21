<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img id='logo' :src='"/images/logo.png"' style: width="50%"/>
                    <div class="card-body" id='search'>
                        <form action="/" method="GET">
                            <input type="text" placeholder="Enter a word" name="choice"/>
                            <button type="submit" name="submit" value="search">search</button>
                            <br />
                            <button type="submit" name="submit" v-for="letter in letters" :key="letter" :value="letter">{{letter}}</button>
                            <br />
                            <button type="submit" name="submit" value="all">All</button>
                            <br />
                            <button type="submit" name="submit" value="orange">orange</button>
                            <br />
                            <button type="submit" name="submit" value="lemon">lemon</button>
                            <br />
                            <button type="submit" name="submit" value="rum">rum</button>
                            <br />
                            <button type="submit" name="submit" value="cranberries">cranberries</button>
                            <br />
                            <button type="submit" name="submit" value="apple">apple</button>
                            <br />
                            <button type="submit" name="submit" value="cranberry juice">cranberry juice</button>
                            <br />
                            <button type="submit" name="submit" value="grape juice">grape juice</button>
                            <br />
                            <button type="submit" name="submit" value="vodka">vokda</button>
                            <br />
                            <button type="submit" name="submit" value="whiskey">whiskey</button>
                            <br />
                            <button type="submit" name="submit" value="apple">apple</button>
                            <br />
                            <button type="submit" name="submit" value="chocolate">chocolate</button>
                            <br />
                            <button type="submit" name="submit" value="kiwi">kiwi</button>
                            <br />
                            <button type="submit" name="submit" value="cantaloupe">cantaloupe</button>
                            <br />
                            <button type="submit" name="submit" value="grapes">grapes</button>
                            <br />
                            <button type="submit" name="submit" value="berries">berries</button>
                            <br />
                            <button type="submit" name="submit" value="ginger">ginger</button>
                            <br />
                            <button type="submit" name="submit" value="mango">mango</button>
                             <br />
                            <button type="submit" name="submit" value="milk">milk</button>
                            <br />
                            <button type="submit" name="submit" value="sherry">sherry</button>
                            <br />
                            <button type="submit" name="submit" value="tequila">tequila</button>
                            <br />
                            <button type="submit" name="submit" value="champagne">champagne</button>
                            <br />
                            <button type="submit" name="submit" value="amaretto">amaretto</button>
                            <br />
                            <button type="submit" name="submit" value="brandy">brandy</button>
                            <br />
                            <button type="submit" name="submit" value="scotch">scotch</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                letters: ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
            }
        },

        mounted() {
        },

        methods: {
        }
    }
</script>
<style scoped>
#search
{
color:blue;
}
</style>