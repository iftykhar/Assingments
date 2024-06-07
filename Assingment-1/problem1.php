<?php
// Problem 1:
// Given a list of integers, find the minimum of their absolute values. 
// Note:
// 'Absolute values' means the non-negative value without regard to its sign. For example, the Absolute value of 123 is 123, and the Absolute value of -123 is also 123. 

class Minimum{

    public function minimum(array $num){

        foreach($num as &$value){
            $value = abs($value);
        }
        echo min($num);
    }
}

$list = [10, 12, 15, 189, 22, 2, 34];
$list2 = [10, -12, 34, 12, -3, 123];

// $obj = new Minimum.minimum($list);
$obj = new Minimum();
$obj->minimum($list);
echo "\n";
$obj->minimum($list2);