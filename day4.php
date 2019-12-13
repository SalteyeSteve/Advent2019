<?php

$inputMin = 307237;
$inputMax = 769058;
$viableCodes = [];
$isViable = false;
$isDouble = false;

for ($code = $inputMin; $code <= $inputMax; $code++) {
    $checkThis = (string)$code;
    for($i = 0; $i < strlen($checkThis); $i++) {
        if (isset($checkThis[$i + 1]) && (int)$checkThis[$i + 1] < (int)$checkThis[$i]) {
            $isViable = false;
            break;
        }
        if (isset($checkThis[$i + 1]) && (int)$checkThis[$i] === (int)$checkThis[$i + 1]) {
            $isDouble = true;
        }
        $isViable = true;
    }
    if ($isViable && $isDouble) {
        $isViable = false;
        $isDouble = false;
        array_push($viableCodes, $code);
    }
}
highlight_file('day4.php');
die('Execution complete, result: '.count($viableCodes));