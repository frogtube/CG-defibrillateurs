<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%s",
    $LON
);
fscanf(STDIN, "%s",
    $LAT
);
fscanf(STDIN, "%d",
    $N
);

// Function calculating the distance between the patient and the defib
function calculateDistance($lonDefib, $latDefib, $LAT, $LON) {

    $x = ($LON - $lonDefib) * cos(($LAT + $latDefib) / 2);
    $y = ($LAT - $latDefib);
    // Calculating the distance based on the earth radius of 6371km
    $d = sqrt($x ** 2 + $y ** 2) * 6371;
    return $d;

}

function convertToFloat($value) {

    $value = str_replace(",", ".", $value);
    return $value;

}

// Getting array from input locations
$listDefib = [];
for ($i = 0; $i < $N; $i++)
{
    $listDefib[] = explode(";", stream_get_line(STDIN, 256 + 1, "\n"));
}


$addressClosestDefib = '';
$distanceClosestDefib = 1000;
$LON = convertToFloat($LON);
$LAT = convertToFloat($LAT);

// Comparing the distance of a new defib address with previous one
foreach($listDefib as $defib) {

    $defib[4] = convertToFloat($defib[4]);
    $defib[5] = convertToFloat($defib[5]);

    $distanceDefib = calculateDistance($defib[4], $defib[5], $LAT, $LON);

    if($distanceDefib < $distanceClosestDefib) {

        $addressClosestDefib = $defib[1];
        $distanceClosestDefib = $distanceDefib;

    }

}

echo("$addressClosestDefib\n");
?>