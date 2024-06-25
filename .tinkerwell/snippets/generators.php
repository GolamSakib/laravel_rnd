<?php
// # Class - Collections
// ## 7 - Understanding Generators
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

# Generators
// Collection::times(1000 * 1000 * 1000);
// LazyCollection::times(1000 * 1000 * 1000);

function multiple_values()
{
    yield 'X'; // <- Execution stops here on current()
    echo "Middle of function";
    yield 'Y'; // <- Execution stops here after next()
}

$gen = multiple_values();

echo $gen->current();
$gen->next();
echo $gen->current();


function getNumbers(): Generator
{
    $n = 1;

     while ($n < 10) {
        yield $n;

        echo "returned $n \n";
        $n++;
    }
}

$gen = getNumbers();
foreach(getNumbers() as $v) {
  echo $v . PHP_EOL;
}

