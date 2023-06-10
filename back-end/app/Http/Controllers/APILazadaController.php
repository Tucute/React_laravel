<?php

namespace App\Http\Controllers;

use App\Models\t_lazada;
use Illuminate\Http\Request;
use Spatie\Backtrace\File;

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

    
    public function deleteProduct($id)		
    {		
        $product = t_lazada::find($id);		
        $fileName = 'source/image/product/' . $product->image;		
        // if (File::exists($fileName)) {		
        //     File::delete($fileName);		
        // }		
        $product->delete();		
        return ['status' => 'ok', 'msg' => 'Delete successed'];		
    }		
    public function editProduct(Request $request, $id)		
    {		
        $product = t_lazada::find($id);		
                
        $product->name = $request->input('name');		
        $product->image = $request->input('image');		
        $product->description = $request->input('description');		
        $product->unit_price = intval($request->input('unit_price'));		
        $product->promotion_price = intval($request->input('promotion_price'));		
        $product->unit = $request->input('unit');		
        $product->new = intval($request->input('new'));		
        $product->id_type = intval($request->input('id_type'));		
                
        $product->save();		
        return response()->json(['status' => 'ok', 'msg' => 'Edit successed']);		
    }		
            
    public function uploadImage(Request $request)		
    {		
        // process image		
        if ($request->hasFile('image')) {		
        $file = $request->file('image');		
        $fileName = $file->getClientOriginalName();		
                
        $file->move('source/image', $fileName);		
                
        return response()->json(["message" => "ok"]);		
        } else return response()->json(["message" => "false"]);		
    }		
}
