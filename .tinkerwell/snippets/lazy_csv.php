<?php
// # Class - Collections
// ## 8 - Processing Huge CSV fiels using LazyCollection
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

$filepath = database_path("/data/sample_customers.csv");
// $customers = LazyCollection::make(function () use($filepath) {
//     $handle = fopen($filepath, 'r');

//     while (($line = fgetcsv($handle)) !== false) {
//         yield $line;
//     }
// });

$customers = File::lines($filepath)
  ->map(fn($line) => str_getcsv($line))
  ->filter(fn($row) => $row[2] > 18)
  ->all();

// ## Converting Collections to Lazy Collection