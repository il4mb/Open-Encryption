<?php

function openEncryp($text, $key)
{

    $arrText = str_split($text, 1);
    $arrKey = str_split($key, 1);

    $keypos = 0;

    foreach ( $arrText AS $key => $chart ) {

        $valdecimal = bindec(toBin($chart));
        $keydecimal = bindec(toBin($arrKey[$keypos]));

        $value = $valdecimal + $keydecimal;

        sumBin(toBin($chart), toBin($arrKey[$keypos]));

        $arrText[$key] = chr($value);

        if ( $keypos >= count($arrKey) -1 ) {
            $keypos = 0;
        } else $keypos += 1;
    }

    return implode("", $arrText);

}

function toBin($chart) {

    $value = unpack('H*', $chart);
    return base_convert($value[1], 16, 2);
}

/**
 * sum two Binary
 */
function sumBin($bin1, $bin2) {

    $bin1 = str_split(strval($bin1), 1);
    $bin2 = str_split(strval($bin2), 1);

    for( $i = count($bin1) -1; $i > 0; $i-- ) {

       echo $bin1[$i]."<br/>";

       // echo "<br/>".$i;
    }
}

function binMath($x, $i) {

    if($x == 0 && $i == 0) {
        return 0;
    } elseif($x == 1 && $i == 0) {
        return 1;
    } elseif ($x == 1 && $i == 1) {

        return 1;
    }
}

$text = "ha";
$ench = openEncryp($text, "ah");

//echo "<hr/>".$ench;

