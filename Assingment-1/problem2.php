<?php

// Problem 2:
// Given a few paragraphs in a file, read the file and count how many words are there. 
// For example, if there is a file with the following contents:

// Nunc ex lorem, ullamcorper ut eleifend ac, pellentesque non dolor.  

// You need to output: 10

// Because there are 10 words. 
// Note: There can be multiple paragraphs. You need to count all of the words from all of the paragraphs. 
// You need to read the data from a file. 

class Wordcount{
    public $file;

    public function countWords(string $file) {
        // Read the contents of the file
        $this->file = file_get_contents($file);
        
        // Count the number of words in the file content
        $wordcount = str_word_count($this->file);
        
        // Output the word count
        echo $wordcount;
    }
}

$words = new Wordcount;
$words->countWords("./Assingment-1/file.txt");

