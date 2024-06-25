<?php
// # Class - Collections
// ## 3 - Practicing Laravel Collection

// Goal: Get total of all variant prices where product type is either "Jacket" or "Coat"

use Illuminate\Support\Facades\File;

$filepath = database_path("/data/shopify_products.json");

// dd(json_decode(file_get_contents($filepath))->products);

$products = File::json($filepath)['products'];

// Traditional implementation with nested loops -- START
$totalPriceA = 0;

foreach($products as $product) {
    if (in_array($product['product_type'], ['Jacket', 'Coat'])) {
      foreach($product['variants'] as $variant) {
        $totalPriceA += floatval($variant['price']);
      }
    }
}
// Traditional implementation with nested loops -- END

// Refactored using Collection -- START
$totalPriceB = collect($products)
  ->whereIn('product_type', ['Jacket', 'Coat'])
  ->flatMap(fn($item) => $item['variants'])
  ->sum('price');
// Refactored using Collection -- END

dd($totalPriceA, $totalPriceB);
