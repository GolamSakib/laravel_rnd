<?php
// # Class - Collections
// ## 4 - Table Lookup with Collection

// We have:
$employees = [
    [
      'name' => 'John',
      'department' => 'Sales',
      'email' => 'john@example.com',
    ],
    [
      'name' => 'Jane',
      'department' => 'Marketing',
      'email' => 'jane@example.com',
    ],
    [
      'name' => 'Dave',
      'department' => 'Marketing',
      'email' => 'dave@example.com'
    ]
];

// We need:
// [
//   "john@example.com" => "John",
//   "jane@example.com" => "Jane",
//   "dave@example.com" => "Dave",
// ]

// Using Collection::mapWithKeys()
collect($employees)->mapWithKeys(fn ($item, $key) => [$item['email'] => $item['name']]);

// Using Collection::pluck()
collect($employees)->pluck('name', 'email');
