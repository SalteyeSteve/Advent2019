<?php

$inputMin = 307237;
$inputMax = 769058;
$viableCodes = [];
$isViable = false;
$isDouble = false;


for ($code = $inputMin; $code <= $inputMax; $code++) {
    $checkThis = (string)$code;
    $isViable = false;
    $isDouble = false;
    $doubles = [];
    for($i = 0; $i < strlen($checkThis); $i++) {
        if (isset($checkThis[$i + 1]) && (int)$checkThis[$i + 1] < (int)$checkThis[$i]) {
            break;
        }
        if (!$isDouble && isset($checkThis[$i + 2])) {
            if (isset($checkThis[$i + 1]) && (int)$checkThis[$i] === (int)$checkThis[$i + 1]) {

                $isDouble = true;
                $isViable = true;
            }
        } else {
            $isDouble = true;
            $isViable = true;
        }

    }
    if ($isViable && $isDouble) {
        array_push($viableCodes, $code);
    }
}
echo '<pre>';
print_r($viableCodes);
echo '</pre>';
die('Execution complete, result: '.count($viableCodes));