<?php

// JavaScript ghadi yeb3ath liha data b AJAX, o hiya ghadi trod ntija b JSON

header('Content-Type: application/json');

// Kanjebdo data li jat mn JavaScript (b POST)
$num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;
$num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
$operator = isset($_POST['operator']) ? $_POST['operator'] : '';

$result = 0;
$error = null;

switch ($operator) {
    case '+':
        $result = $num1 + $num2;
        break;
    case '-':
        $result = $num1 - $num2;
        break;
    case '*':
        $result = $num1 * $num2;
        break;
    case '/':
        if ($num2 == 0) {
            $error = "Ma tqasmch 3la 0";
        } else {
            $result = $num1 / $num2;
        }
        break;
    default:
        $error = "Operator machi sa7i7";
}

// Kansenn3o response, o kanb3thouha l JavaScript f format JSON
if ($error) {
    echo json_encode(['success' => false, 'error' => $error]);
} else {
    // Kanmsa7o zeros zayda mn ba3d el fasla (b7al 5.0000 -> 5)
    $result = round($result, 10);
    echo json_encode(['success' => true, 'result' => $result]);
}
