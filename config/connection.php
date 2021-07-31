<?php

require_once "config.php";



try {
    $con = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    logError(500);
}

function executeQuery($query){
    global $con;
    return $con->query($query)->fetchAll();
}

function fetchOne($query){
    global $con;
    return $con->query($query)->fetch();
}

function pristupStrani(){
    $open = fopen(LOG_FAJL, "a");
    if($open){
        $date = date('d-m-Y H:i:s');
        $str=basename($_SERVER['REQUEST_URI']."\t".$date."\t".$_SERVER['REMOTE_ADDR']."\t\n");
        fwrite($open, $str);
        fclose($open);
    }
}

function logError($code){
        $file = fopen(ERROR_FAJL, "a");
        $str = basename($_SERVER['REQUEST_URI']) . "\t" . date("d.m.Y H:i:s") . "\t" . $_SERVER['REMOTE_ADDR']  . "\t" . $code . "\n";

        fwrite($file, $str);
        fclose($file);

        http_response_code($code);
    }