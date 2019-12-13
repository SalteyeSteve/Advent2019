<?php
$inputMin = 307237;
$inputMax = 769058;
$viableCodes = [];

for ($code = $inputMin; $code <= $inputMax; $code++) {
    $checkThis = (string)$code;
    $isViable = false;
    $isDouble = false;
    $prevNum = 0;
    for($i = 0; $i < strlen($checkThis); $i++) {
        if (isset($checkThis[$i + 1])) {
            $nextNum = (int)$checkThis[$i + 1];
            $currentNum = (int)$checkThis[$i];

            if($nextNum < $currentNum) {
                $isViable = false;
                break;
            }
            if ($currentNum === $nextNum && $currentNum > $prevNum) {
                if (!isset($checkThis[$i + 2]) || (int)$checkThis[$i + 2] > $currentNum) {
                    $isDouble = true;
                }
            }
            $prevNum = $currentNum;
        }
        $isViable = true;
    }
    if ($isViable && $isDouble) {
        array_push($viableCodes, $code);
    }
}
highlight_file('day4-2.php');
die('Execution complete, result: '.count($viableCodes));