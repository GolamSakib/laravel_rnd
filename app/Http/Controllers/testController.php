<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class testController extends Controller
{
    public function index()
    {
        $filepath = database_path('data/shopify_products.json');
        $total = collect(File::json($filepath)['products'])
        ->whereIn('product_type',['Jacket','Coat'])
        ->flatMap(fn($item) => $item['variants'])
        ->sum('price')
        ;

    }
}
