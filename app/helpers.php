<?php

// Custom transliteration function
//function myanmarToSlug($text) {
//    $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text); // Remove special characters
//    $text = preg_replace('/\s+/u', '-', $text); // Replace spaces with dashes
//    $text = trim($text, '-'); // Trim dashes from the beginning and end
//    return $text;
//}
// Custom slug generation function
function myanmarToSlug($text)
{
    $text = preg_replace('/\s+/u', '-', $text); // Replace spaces with dashes
    $text = trim($text, '-'); // Trim dashes from the beginning and end
    return $text;
}
