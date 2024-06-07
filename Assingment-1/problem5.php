<?php
// Problem 5:
// Given an integer n, find the sum of the digits of the integer.

// Sample input 1:
// 62343
// Sample output 1: 
// 18

// Sample input 2:
// 1000
// Sample output 2: 
// 1

class IntSum{

    public function sum(int $n){
        $str = str_split((string)$n,1);
        
        $sum = 0;
        foreach($str as $num){
            $sum += (int)$num;
        }

        echo $sum;
    }

    
}

$obj = new IntSum;
$obj->sum(1000);