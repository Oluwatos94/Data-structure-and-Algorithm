<?php

function recursive_binary_search(Array $list, $target){
    // check if Base case is empty list
    if (count($list) === 0){
        return false;
    } else {
        // Calculate the midpoint using integer division
        $midPoint = (int)(count($list) / 2);
    }

    if ($list[$midPoint] == $target){
        return true;
    } elseif ($list[$midPoint] < $target){
        // Make a recursive call with the sublist to the right of the midpoint
        return recursive_binary_search(array_slice($list, $midPoint+1), $target);
    } elseif ($list[$midPoint] > $target) {
                // Make a recursive call with the sublist to the left of the midpoint
        return recursive_binary_search(array_slice($list, 0, $midPoint), $target);
    }
}

$numb = [1,2,3,4,5,6,7,8,9,10];

function checkResult($index)
{
    echo $index ? "Found" : "Not Found";
}

$index = recursive_binary_search($numb, 40);
checkResult($index);