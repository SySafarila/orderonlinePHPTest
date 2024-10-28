<?php

// question 1
function sum_deep($tree, $char, $level = 1)
{
    $sum = 0;

    // check if the root node or the children contain the character
    if (is_string($tree[0]) && strpos($tree[0], $char) !== false) {
        $sum += $level;
    }

    // check through children node if they exist
    for ($i = 1; $i < count($tree); $i++) {
        if (is_array($tree[$i])) {
            $sum += sum_deep($tree[$i], $char, $level + 1);
        }
    }

    return $sum;
}

// test question 1
echo "question 1";
echo "\n";
echo sum_deep(["AB", ["XY"], ["YP"]], "Y"); // output: 4
echo "\n";
echo sum_deep(["", ["", ["XXXXX"]]], "X"); // output: 3
echo "\n";
echo sum_deep(["X"], 'X'); // output: 1
echo "\n";
echo sum_deep([""], 'X'); // output: 0
echo "\n";
echo sum_deep(["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]], "X"); // output: 7
echo "\n";
echo sum_deep(["X", [""], ["X"], ["X"], ["Y", [""]], ["X"]], "X"); // output: 7
echo "\n";
echo "\n";

// question 2
function get_scheme($html_string)
{
    $arr = [];
    $dom = new DOMDocument();

    // laod string as HTML
    $dom->loadHTML($html_string, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $elements = $dom->getElementsByTagName('*');

    // looping elements
    foreach ($elements as $element) {
        // looping attributes of element
        foreach ($element->attributes as $attribute) {
            $attributeName = $attribute->name;
            if (str_contains($attributeName, 'sc')) {
                // accept if attribute contain sc-
                array_push($arr, explode('sc-', $attributeName)[1]);
            }
        }
    }

    return $arr;
}

// test question 2
echo "question 2";
echo "\n";
echo print_r(get_scheme("<i sc-root>Hello</i>")); // output: ["root"]
echo "\n";
echo print_r(get_scheme('<div><div sc-rootbear title="Oh My">Hello <i sc-org>World</i></div></div>')); // output: ["rootbear", "org"]
echo "\n";
echo "\n";

// question 3
function pattern_count($text, $pattern)
{
    $textLength = 0;
    $patternLength = 0;
    $count = 0;

    // use while loop to avoid predefined helper
    while (isset($text[$textLength])) {
        $textLength++;
    }

    while (isset($pattern[$patternLength])) {
        $patternLength++;
    }

    // If pattern is empty, return 0
    if ($patternLength === 0) {
        return 0;
    }

    // Loop through the text
    for ($i = 0; $i <= $textLength - $patternLength; $i++) {
        // Check for a match
        $match = true;
        for ($j = 0; $j < $patternLength; $j++) {
            if ($text[$i + $j] !== $pattern[$j]) {
                $match = false;
                break;
            }
        }
        // If match found, increment count
        if ($match) {
            $count++;
        }
    }

    return $count;
}

// test question 3
echo "\n";
echo "question 3";
echo "\n";
echo pattern_count("palindrom", "ind"); // output: 1
echo "\n";
echo pattern_count("abakadabra", "ab"); // output: 2
echo "\n";
echo pattern_count("hello", ""); // output: 0
echo "\n";
echo pattern_count("ababab", "aba"); // output: 2
echo "\n";
echo pattern_count("aaaaaa", "aa"); // output: 5
echo "\n";
echo pattern_count("hell", "hello"); // output: 0
echo "\n";
