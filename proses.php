<?php
/**
 * Created by PhpStorm.
 * User: VIERY
 * Date: 11/24/2018
 * Time: 8:32 PM
 */


$miu = random_float(-1,1);
function random_float ($min,$max) {
    return ($min+lcg_value()*(abs($max-$min)));
}

function update_w($index_i,$error) {
    global $miu;
    global $w;
    global $input_sequence;
    for ($i=0;$i<3;$i++) {
        $w[$i] = $w[$i] + (($miu * $input_sequence[$index_i][$i]) * $error);
    }
    return $w;
}

//input sequence
$input_sequence = array(
    //input
    array(1,0,0),
    array(1,0,1),
    array(1,1,0),
    array(1,1,1),
);

$target = array(0,0,0,1);
//
//for ($i=0;$i<3;$i++) {
//    $w[$i] = random_float(-1,1);
//}
$w = array(-0.3,0.5,-0.4);

//training perceptron
print_r($w);
for ($ii=0;$ii<100;$ii++) {
//    print_r($w);
    for ($i = 0; $i < 4; $i++) {
        $hasil[$i] = 0;
        for ($j = 0; $j < 3; $j++) {
            $sementara = $input_sequence[$i][$j] * $w[$j];
            $hasil[$i] += $sementara;
//            $index_w = $j;
        }
        if ($hasil[$i] <= 0) {
            $output[$i] = 0;
        }
        else if ($hasil > 0) {
            $output[$i] = 1;
        }
        $error = $output[$i] - $target[$i];
        if ($error != 0) {
            //unset($w);
            $w = update_w($i, $error);
        }
    }
    print_r($output);
    print_r($w);
//    print_r($hasil);
}