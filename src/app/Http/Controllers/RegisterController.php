<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Product;
use App\Models\Season;
use App\Models\Product_season;

class RegisterController extends Controller
{
    public function index()
    {
        $seasons = Season::all();

        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $product = $request->only(['name', 'price', 'image', 'description']);

        Product::create($product);

        $product_season = $request->only(['product_id', 'season_id']);

        Product_season::create($product_season);

        if(request('images')) {
            $name = request()->file('images')->getClientOriginalName();
            request()->file('images')->move('storage/images', $name);
            $post->image = $name;
        }

        return view('index');
    }
}
