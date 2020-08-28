<?php
    session_start();
    
    $result = array(
        "result" => "",
        "message" => "",
        "output" => ""
    );
    
    function res($send){
        header("Content-Type: application/json");
        echo json_encode($send);
        exit();
    }
    
    /* Generate random string */
    function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    
    // main start
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    /* Check if common request. */
    if(!isset($data["create_url"]) || !isset($_SESSION["check"]) || $data["create_url"] != 1 || $_SESSION["check"] != 1){
        $result["result"] = "error";
        $result["message"] = "Can not create url.";
        res($result);
    }
    
    $_SESSION["url"] = "/receive/".generateRandomString();
    $result["result"] = "success";
    $result["output"] = $_SESSION["url"];
    res($result);
?>