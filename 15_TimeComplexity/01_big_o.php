<?php
// O(1) example: Accessing an array element

function accessElement($arr, $index) {
    return $arr[$index];  // Constant time operation
}

$arr = [10, 20, 30, 40, 50];
echo accessElement($arr, 3);  // Output: 40
?>

<?php
// O(log n) example: Binary Search

function binarySearch($arr, $target) {
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
        $mid = intdiv($low + $high, 2);

        if ($arr[$mid] == $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }
    return -1;
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$target = 6;
echo binarySearch($arr, $target);  // Output: 5
?>

<?php
// O(n) example: Summing elements in an array

function sumArray($arr) {
    $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;  // Each element is processed exactly once
    }
    return $sum;
}

$arr = [1, 2, 3, 4, 5];
echo sumArray($arr);  // Output: 15
?>

<?php
// O(n log n) example: Merge Sort

function mergeSort(&$arr) {
    if (count($arr) <= 1) {
        return;
    }

    $mid = intdiv(count($arr), 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    mergeSort($left);
    mergeSort($right);
    merge($arr, $left, $right);
}

function merge(&$arr, $left, $right) {
    $i = 0;
    $j = 0;
    $k = 0;

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $arr[$k++] = $left[$i++];
        } else {
            $arr[$k++] = $right[$j++];
        }
    }

    while ($i < count($left)) {
        $arr[$k++] = $left[$i++];
    }

    while ($j < count($right)) {
        $arr[$k++] = $right[$j++];
    }
}

$arr = [38, 27, 43, 3, 9, 82, 10];
mergeSort($arr);
print_r($arr);  // Output: [3, 9, 10, 27, 38, 43, 82]
?>

<?php
// O(n²) example: Bubble Sort

function bubbleSort(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

$arr = [64, 25, 12, 22, 11];
bubbleSort($arr);
print_r($arr);  // Output: [11, 12, 22, 25, 64]
?>
