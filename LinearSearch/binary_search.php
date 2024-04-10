<?php

function binary_search($list, $target){
    $firstIndex = 0;
    $lastIndex = count($list) - 1;

    while ($firstIndex <= $target){
        $mid = ($firstIndex + $lastIndex) >> 1;

        if ($list[$mid] === $target) {
            return $mid;
        } elseif ($list[$mid] > $target){
            $lastIndex = $mid - 1;
        } elseif ($list[$mid] < $target) {
            $firstIndex = $mid + 1;
        }
    }
    
    return -1;
}

$numb = [1,2,3,4,5,6,7,8,9,10];

function checkResult($index)
{
    if ($index !== -1){
        echo "correct guy";
    } else {
        echo "try again";
    }
}

$test = binary_search($numb, 4);
checkResult($test);
