<?php
// Problem 3:
// Given a sentence, keep the order of the words same, but reverse the characters of each word. 
// For example, if the given sentence is: ‘I love programming’ 
// The result should be: ‘I evol gnimmargorp’

// Here the order of the words is the same as the given sentence, but the order of the characters in the words is reversed. 

// $a = readline("text: ");
// echo $a;

class ReverseWords {
    function reverse() {
        $sample = 'I love programming';

        $words = explode(" ", $sample);
        foreach ($words as &$value) {
            $value = strrev($value);
        }
        $reverseWords = implode(" ", $words);

        return $reverseWords;
    }
}

$obj = new ReverseWords();
$result = $obj->reverse();
echo $result;  // Output: "I evol gnimmargorp"
