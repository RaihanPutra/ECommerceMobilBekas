<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = request('search');
        $merchant = request('merchant');

        $query = Product::with(['merchant']);
        if ($search) {
            $query = $query->where('title', 'like', '%' . $search . '%');
        }
        if ($merchant) {
            $query = $query->whereHas('merchant', function ($query) use ($merchant) {
                $query->where('name', '=',  $merchant);
            });
        }
        $products = $query->latest()
            ->paginate(9)
            ->appends($request->query());

        $merchants = Merchant::has('products')->get();

        return view('product.index', compact('products', 'merchants'));
    }

    public function show(Product $product, Merchant $merchant)
    {
        $product->load(['merchant']);
        return view('product.show', compact('merchant','product'));
    }
}
