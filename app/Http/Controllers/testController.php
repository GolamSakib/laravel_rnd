<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class testController extends Controller
{
    public function index()
    {
        $filepath = database_path('data/shopify_products.json');
        $total = collect(File::json($filepath)['products'])->filter(fn($product) => $product['product_type'] == 'Jacket' || $product['product_type'] == 'Coat')->map(fn($item) => $item['variants'])->flatten(1)->reduce(function ($total, $item) {
            return $total += floatval($item['price']);
        }, 0);
        dd($total);

    }
}
