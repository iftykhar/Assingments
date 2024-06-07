<?php
// Problem 4:
// Print the following pattern based on the given number n (can be any number). 
// Sample input: 5 
// Sample output: 
//     *
//    ***
//   *****
//  *******
// *********

class Pattern{


    public function triangle(int $n){

        for($i=1;$i<=$n;$i++){

            //for blanks
            for($j=1; $j<=$n-$i;$j++){
                echo " ";
            }
            //for stars
            for($j=1; $j<=(2*$i-1);$j++){
                echo "*";
            }
            echo "\n";
        }
    }
}

$obj = new Pattern;
$obj->triangle(5);