<?php

namespace App\Http\Controllers;

use App\Models\t_lazada;
use Illuminate\Http\Request;

class APILazadaController extends Controller
{
    public function getLazada()			
    {			
    $lazada = t_lazada ::all();			
    return response()->json($lazada);			
    }	
    public function getOneLazada($id)			
    {			
    $lazada = t_lazada::find($id);			
    return response()->json($lazada);			
    }

    public function addProduct(Request $request)
    {

        $product = new t_lazada();
        $product->name = $request->input('name');	
        $product->image = $request->input('image');
        $product->price = $request->input('price');	
        $product->shopower = $request->input('shopower');		
        
        $product->save();
        return $product;
    }
}
