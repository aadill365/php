<?php

function select_db($query){
$db = mysqli_connect("remotemysql.com","z36Fs3ug1u","mDGs2KDYBn","z36Fs3ug1u");

    

    $user_query=$query;
    $result = mysqli_query($db,$user_query);
    
        $user = mysqli_fetch_assoc($result);
        if ($user){
        return true;

    }else{
        return false;
        }
}

function insert_db($query){
    $db = mysqli_connect("remotemysql.com","z36Fs3ug1u","mDGs2KDYBn","z36Fs3ug1u");

   
    $user_query=$query;

    $result = mysqli_query($db,$user_query);
}


function get_all_recepients(){

    $db = mysqli_connect("remotemysql.com","z36Fs3ug1u","mDGs2KDYBn","z36Fs3ug1u");

$user_query="SELECT * FROM users WHERE active='1'";
    $result = mysqli_query($db,$user_query);
    $arr=mysqli_fetch_all($result,MYSQLI_ASSOC);    
    mysqli_free_result($result);
    return $arr;

}

function exec_db($query){
    $db = mysqli_connect("remotemysql.com","z36Fs3ug1u","mDGs2KDYBn","z36Fs3ug1u");

    $result = mysqli_query($db,$query);
}

?>