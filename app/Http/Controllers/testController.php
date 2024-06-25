<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
        $filepath=database_path('data/shopify_products.json');
        dd(file_get_contents($filepath));
    }
}
