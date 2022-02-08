<?php


function dataNotFoundException($argResult, $argDataToFind)
{
    try {
 
        if ($argResult == []) {
            throw new Exception();
        }
    } catch (\Throwable $th) {
        http_response_code(404);
        header('Content-Type: aplication/json');
        $array = ["message" => "Data $argDataToFind tidak dapat ditemukan", "exception" => "dataNotFoundException", "helper"=>"Exception_helper"];
        echo json_encode($array);
        die;
    }
}
