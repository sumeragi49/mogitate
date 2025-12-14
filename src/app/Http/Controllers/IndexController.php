<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Models\Product_season;
use Illuminate\Http\Request;
use App\Http\Requests\IndexRequest;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $product_seasons = Product_season::with('product', 'season')->get();
        $products = Product::all();
        $seasons = Season::all();

        $products = Product::simplePaginate(6);

        dd($products);
        return view('index', compact('product_seasons', 'products', 'seasons'));
    }

    public function show($product_id)
    {
        $product_seasons = Product_season::with('product', 'season')->get();
        dd($productId);
        $products = Product::find($product_id);
        $seasons = Season::all();

        return view('detail', compact('product_seasons', 'products', 'seasons'));
    }

    public function search(IndexRequest $request)
    {
        $products = Product::all()->KeywordSearch($request->keyword)->get();

        return view('index', compact('products'));
    }
}
