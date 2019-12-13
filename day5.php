<?php

$codeZero = false;
$i = 0;
while (!$codeZero) {
    switch ($code[$i]) {
        case 1:
            $result = $code[$code[$i + 1]] + $code[$code[$i + 2]];
            $code[$code[$i + 3]] = $result;
            $i += 4;
            break;
        case 2:
            $result = $code[$code[$i + 1]] * $code[$code[$i + 2]];
            $code[$code[$i + 3]] = $result;
            $i += 4;
            break;
        case 99:
            print('Result : ' . $code[0] . '<br><br>');
            $codeZero = true;
            break;
    }
}