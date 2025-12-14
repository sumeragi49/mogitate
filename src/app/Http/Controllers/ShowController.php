<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Models\Product_season;
use Illuminate\Http\Request;
use App\Http\Requests\IndexRequest;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        $product_seasons = Product_season::with('product', 'season')->get();
        $products = Product::all();
        $seasons = Season::all();

        $products = Product::simplePaginate(6);

         return view('detail', compact('product_seasons', 'products', 'seasons'));
    }

    public function update(IndexRequest $request)
    {

        $product = $request->only(['name', 'price', 'image', 'description']);
        Product::find($request->product_id)->update($product);

        return redirect('/products/detail');
    }

    public function destroy(Request $request)
    {
        Product::find($request->product_id)->delete();
        return redirect('/products/detail');
    }
}
