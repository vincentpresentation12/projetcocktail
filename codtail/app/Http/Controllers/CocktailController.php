<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cocktail::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'recipe' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName); 

        $data = $request->all();
        $data['image'] = $imageName;

        Cocktail::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cocktail  $cocktail
     * @return \Illuminate\Http\Response
     */
    public function show(Cocktail $cocktail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cocktail  $cocktail
     * @return \Illuminate\Http\Response
     */
    public function edit(Cocktail $cocktail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cocktail  $cocktail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'recipe' => 'required',
        ]);

        $data = $request->all();
        $cocktail = Cocktail::findOrFail($id);
        $cocktail->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cocktail  $cocktail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cocktail = Cocktail::findOrFail($id);
        $cocktail->delete();
        return Cocktail::latest()->get();
    }
}
