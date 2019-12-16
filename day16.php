<?php
$executionStartTime = microtime(true);

$input = '59767332893712499303507927392492799842280949032647447943708128134759829623432979665638627748828769901459920331809324277257783559980682773005090812015194705678044494427656694450683470894204458322512685463108677297931475224644120088044241514984501801055776621459006306355191173838028818541852472766531691447716699929369254367590657434009446852446382913299030985023252085192396763168288943696868044543275244584834495762182333696287306000879305760028716584659188511036134905935090284404044065551054821920696749822628998776535580685208350672371545812292776910208462128008216282210434666822690603370151291219895209312686939242854295497457769408869210686246';
$phase = 0;

do {
    $nextInput = '';
    for ($outputPointer = 1; $outputPointer <= count(str_split($input)); $outputPointer++) {
        $result = 0;
        $pattern = calculatePatern($outputPointer);
        $patternPointer = 0;
        foreach (str_split($input) as $digit) {
            $digit = intval($digit);
            if ($patternPointer === count($pattern)) {
                $patternPointer = 0;
            }
            $result += intval($digit * $pattern[$patternPointer]);
            $patternPointer++;
        }
        $nextInput .= substr(strval($result), -1);
    }
    $input = $nextInput;
    $phase++;
}
while ($phase < 100);

echo 'Result '.substr($input, 0, 8);

function calculatePatern ($increment) {
    $pattern = [0, 1, 0, -1];
    $newPattern = [];
    foreach ($pattern as $repetition)
    {
        for($i = 0; $i < $increment; $i++) {
            array_push($newPattern, $repetition);
        }
    }
    $unset = $newPattern[0];
    array_shift($newPattern);
    array_push($newPattern, $unset);
    return $newPattern;
}