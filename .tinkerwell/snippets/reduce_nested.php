<?php
// # Class - Collections
// ## 5 (Ex) - Calculating multiple, nested values using reduce()

// We have many array of player statistics.
// Same player can appera in multiple array.
$arr1 = [
    ['name' => 'Joe Brown', 'goals' => 0, 'assists' => 0, 'points' => 0],
    ['name' => 'Jim Bob', 'goals' => 2, 'assists' => 1, 'points' => 3],
    ['name' => 'Harry Styles', 'goals' => 1, 'assists' => 1, 'points' => 2],
    ['name' => 'Craig Mack', 'goals' => 5, 'assists' => 7, 'points' => 12],
];

$arr2 = [
    ['name' => 'Craig Mack', 'goals' => 3, 'assists' => 3, 'points' => 6, 'ppg' => 0, 'ppa' => 0, 'pims' => 0],
    ['name' => 'Jim Bob', 'goals' => 1, 'assists' => 4, 'points' => 5, 'ppg' => 0, 'ppa' => 1, 'pims' => 0],
    ['name' => 'Joe Brown', 'goals' => 0, 'assists' => 0, 'points' => 0, 'ppg' => 0, 'ppa' => 0, 'pims' => 0],
    ['name' => 'Harry Styles', 'goals' => 0, 'assists' => 0, 'points' => 0, 'ppg' => 0, 'ppa' => 0, 'pims' => 0],
];

// We need to sum goals and assists of each player (by name) across all provided arrays

// Receive any number of state arrays
function summarisePlayerStats(array ...$stats) {
    return collect([...$stats])->flatten(1)
    ->reduce(function($score, $item) {
        $score[$item['name']] = $score[$item['name']] ?? ['goals' => 0,'assists' => 0];
        $score[$item['name']]['goals'] += $item['goals'];
        $score[$item['name']]['assists'] += $item['assists'];

        return $score;
    }, []);
}
dd(summarisePlayerStats($arr1, $arr2));
