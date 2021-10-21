<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Searchcontroller extends Controller
{
    public function getDataApi()
    {
        $reqUser=request('submit');
        
        if ($reqUser=="")//initialisation de la page => afficher les cocktails commençant par A
        {
            $cocktails[0]=Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f=a');
        }
        elseif ($reqUser=="search")//l'utilisateur à cliqué sur le bouton search
        {
            $search=request('choice');//récupération de la saisie de l'utilsateur dans la barre de recherche
            if ($search=="") //l'utilisateur n'a pas saisie de texte 
            {
                $cocktails[0]=Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f=a');
            }
            else //l'utilisateur demande les cocktails dont le nom est contenu dans $search
            {
                $cocktails[0]=Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?s='.$search);
            }
        }
        elseif ($reqUser=="all")//l'utilisateur demande à voir tous les cocktails
        {
            for($i=65;$i<91;$i++)
            {
                $cocktails[$i]=Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f='.chr($i));
            }
        }
        elseif ($reqUser=="orange" || $reqUser=="lemon" || $reqUser=="rum" || $reqUser=="cranberries" || $reqUser=="apple" || $reqUser=="cranberry juice" || $reqUser=="grape juice" || $reqUser=="vodka" || $reqUser=="whiskey" || $reqUser=="apple" || $reqUser=="chocolate" || $reqUser=="kiwi" || $reqUser=="cantaloupe" || $reqUser=="grapes" || $reqUser=="berries" || $reqUser=="ginger" || $reqUser=="mango" || $reqUser=="milk" || $reqUser=="sherry" || $reqUser=="tequila" || $reqUser=="champagne" || $reqUser=="amaretto" || $reqUser=="brandy" || $reqUser=="scotch")
        {
            $cocktails[0]=Http::get('https://www.thecocktaildb.com/api/json/v1/1/filter.php?i='.$reqUser);
        }
        else//l'utilisateur demande les cocktails commençant pas la lettre contenue dans $reqUser
        {
            $cocktails[0]=Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f='.$reqUser);
        }

        return view('welcome', compact('cocktails'));//retourner la variable $cocktails dans la vue "welcome" */
    }
}
