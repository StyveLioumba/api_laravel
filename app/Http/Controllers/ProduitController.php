<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit=Produit::all();

        $response=APIHelpers::createAPIResponse(false,200,"",$produit);

        return response()->json($response,200);
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
        $produit=new Produit();
        $produit->name=$request->name;
        $produit->description=$request->description;
        $produit->prix=$request->prix;
        $produit_save=$produit->save();
        if ($produit_save)
        {

            $response=APIHelpers::createAPIResponse(false,201,"le produit a été ajouter",null);

            return response()->json($response,200);
        }
        else
        {

            $response=APIHelpers::createAPIResponse(true,400,"le produit n'a pas été ajouter",null);

            return response()->json($response,400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit=Produit::find($id);

        $response=APIHelpers::createAPIResponse(false,200,"",$produit);

        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produit=Produit::find($id);
        $produit->name=$request->name;
        $produit->description=$request->description;
        $produit->prix=$request->prix;
        $produit_save=$produit->save();
        if ($produit_save)
        {

            $response=APIHelpers::createAPIResponse(false,200,"le produit a été mise à jour",null);

            return response()->json($response,200);
        }
        else
        {

            $response=APIHelpers::createAPIResponse(true,400,"le produit n'a pas été mise à jour",null);

            return response()->json($response,400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit=Produit::find($id);
        $produit_save=$produit->delete();
        if ($produit_save)
        {

            $response=APIHelpers::createAPIResponse(false,200,"le produit a été supprimer",null);

            return response()->json($response,200);
        }
        else
        {

            $response=APIHelpers::createAPIResponse(true,400,"le produit n'a pas été supprimer",null);

            return response()->json($response,400);
        }
    }
}
