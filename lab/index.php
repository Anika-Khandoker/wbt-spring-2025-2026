<?php
$length = 10;
$width = 5;

$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Area: " . $area . "<br>";
echo "Perimeter: " . $perimeter;
?>

<?php
$amount = 1000;

$vat = $amount * 0.15;

echo "Amount: " . $amount . "<br>";
echo "VAT (15%): " . $vat;
?>

<?php
$number = 7;
if ($number % 2 == 0){
    echo $number . "is even";
}
else {
    echo $number . " is odd";
}
?>

<?php
$a = 10;
$b = 25;
$c = 15;

if ($a >= $b && $a >= $c) {
    echo "largest: " . $a;
} elseif ($b >= $a && $b >= $c) {
    echo "largest: " . $b;
} else {
    echo "largest: " . $c;
}
?>
<?php
for ($i = 10; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
?>
//localhost:81/wbt/index.php


