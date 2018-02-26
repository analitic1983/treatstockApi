<?php
include '../Loader.php';

$request = new \treatstock\api\v2\requests\RequestGetMaterialGroupColors();
$request->privateKey = '15ce76a20be443acfeae731cbc27dc'; // Enter here YOUR private key. This is test private key.

$treatstockApiV2 = new \treatstock\api\v2\TreatstockApiService();
$treatstockApiV2->isDebug = true; // Comment this line, to disable output
$answer = $treatstockApiV2->processRequest($request);

echo json_encode($answer, JSON_PRETTY_PRINT) . "\n";