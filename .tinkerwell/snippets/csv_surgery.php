<?php
// # Class - Collections
// ## 6 - Processing CSV data
$filepath = database_path("/data/sample_customers.csv");
$data = file($filepath);
$header = str_getcsv(array_shift($data));

collect($data)
  ->map(fn($line) => str_getcsv($line))
  ->filter(fn($row) => $row[2] > 18)
  ->all();


