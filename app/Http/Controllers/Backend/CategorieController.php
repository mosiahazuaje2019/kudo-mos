<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

use App\Http\Resources\CategorieCollection;
use App\Http\Resources\Categorie as CategorieResources;
use App\Http\Requests\CategorieRequest\Categorie as CategorieRequest;

class CategorieController extends Controller
{
    protected $categorie;

    public function __construct(Categorie $categorie){
        $this->categorie = $categorie;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            new CategorieCollection(
                $this->categorie->orderBy('name','asc')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request){
        $categories = $this->categorie->create($request->all());
        return response()->json(new CategorieResources($categories), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return response()->json(
            new CategorieResources($categorie)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());
        return response()->json(new CategorieResources($categorie));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return response()->json(null, 204);
    }
}
