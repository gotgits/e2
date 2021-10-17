<?php
$word = ['apple', 'lynx', 'hi', 'mississippi'];
$vowels = ['a', 'e', 'i', 'o', 'u'];
function vowelCount(int $word)
    
{
    str_split($word);
    
    for($i = 0; $i == $vowels; i++);
}
$example1 = vowelCount('apple'); # Should yield 2
$example2 = vowelCount('lynx'); # Should yield 0
$example3 = vowelCount('hi'); # Should yield 1
$example4 = vowelCount('mississippi'); # Should yield 4