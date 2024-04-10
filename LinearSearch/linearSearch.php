<?php

function linearSearch(Array $list, $key)
{
    $count = count($list);

    for ($i = 0; $i < $count; $i++){
        if ($list[$i] == $key){
            return $i;
        }
        
    }
        return -1;
}
$numb = [1,2,3,4,5,6,7,8,9,];

function checkResult($index)
{
    if ($index !== -1){
        echo "correct guy";
    } else {
        echo "try again";
    }
}

$test = linearSearch($numb, 8);
checkResult($test);

