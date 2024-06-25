<?php
// # Class - Collections
// ## 2 - Higher Order Functions

// Initial implementation
// ---------------------------------------------
function getCustomerEmails(array $customers)
{
    $customerEmails = [];

    foreach ($customers as $customer) {
        $customerEmails[] = $customer->email;
    }

    return $customerEmails;
}

function getStockTotoals(array $inventoryItems)
{
    $stockTotals = [];

    foreach ($inventoryItems as $item) {
        $stockTotals[] = [
            'product' => $item->productName,
            'total_value' => $item->quantity * $item->price,
        ];
    }

    return $stockTotals;
}


// Refactored by extracting a higher order function
// ---------------------------------------------

function map(array $items, $func)
{
    $result = [];
    foreach ($items as $item) {
        $result[] = $func($item);
    }

    return $result;
}

function _getCustomerEmails(array $items)
{
    return map($items, fn($item) => $item->email);
}

function _getStockTotoals(array $items)
{
    return map($items, function($item) {
        return [
            'product' => $item->productName,
            'total_value' => $item->quantity * $item->price,
        ];
    });
}
