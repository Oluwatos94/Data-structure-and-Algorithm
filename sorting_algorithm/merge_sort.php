<?php

function merge_sort($values) {
// Base case: if the list has zero or one values, there's nothing to sort
if (count($values) <= 1) {
return $values;
}

// Split the list in half
$middle_index = floor(count($values) / 2);
// Get the left half of the list and recursively sort it
$left_values = merge_sort(array_slice($values, 0, $middle_index));
// Get the right half of the list and recursively sort it
$right_values = merge_sort(array_slice($values, $middle_index));

// Merge the two sorted halves together
$sorted_values = [];
$left_index = 0;
$right_index = 0;

while ($left_index < count($left_values) && $right_index < count($right_values)) {
if ($left_values[$left_index] < $right_values[$right_index]) {
    $sorted_values[] = $left_values[$left_index];
    $left_index++;
} else {
    $sorted_values[] = $right_values[$right_index];
    $right_index++;
}
}

// Copy over the remaining values from both halves
$sorted_values = array_merge($sorted_values, array_slice($left_values, $left_index));
$sorted_values = array_merge($sorted_values, array_slice($right_values, $right_index));

return $sorted_values;
}

// Test the merge_sort function
$values = [5, 9, 1, 3, 4, 6, 6, 3, 2];
$sorted_values = merge_sort($values);
print_r($sorted_values);
?>
