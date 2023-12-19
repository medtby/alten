<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'status' => 'success',
            'data' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'code' => 'nullable|string',
            'description' => 'nullable|string'
          ]);
        
        $products = Product::create($request->only([
            'code', 'name','description', 'price'
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //findorfail
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produit introuvable'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $product 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) { 
            return response()->json([
                'status' => 'error',
                'message' => 'Produit introuvable'
            ], 404);
        }

        //vlidate

        $product->update($request->only([
            'code', 'name', 'description', 'price', 'quantity'
        ]));

        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Impossible de trouver le produit à supprimer'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Produit supprimé avec succès'
        ]);
    }
}
