<?php

$HOST_NAME = 'localhost';
$USER_NAME = 'miltiadi_user';
$PASSWORD = 'user_password';
$DB_NAME = 'miltiadi_ITE_db';

$CONN = new mysqli($HOST_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

if($CONN->connect_error)
{
    echo "status: error";
    die($CONN->connect_error);
}
else
{
    echo "status: connected </br> </br>";
}

function checklogin($un, $up)
{
    global $CONN;
    
    $query = "SELECT * FROM users";
    $result = $CONN->query($query);
    
    if(!$result)
    {
        die($CONN->error);
    }
    while($row=mysqli_fetch_array($result))
    {
        //echo "username: ". $row["username"] . "</br>";
        // echo "password: ". $row["password"] . "</br>";
         
        if($un == $row["username"] && md5($up) == $row["password"])
        {
            return true;
        }
    }
    return false;
}

function addNewUser($un, $up, $um, $uf, $ul, $upn, $upID)
{
    global $CONN;
    
    $query = "INSERT INTO users (username, password, email, firstname, lastname, phonenumber, photo) 
        VALUES('" . $un . "','" . md5($up) . "','" . $um . "','" . 
        (!empty($uf) ? $uf : NULL) . "','" . 
        (!empty($ul) ? $ul : NULL) . "','" . 
        (!empty($upn) ? $upn : NULL) . "','" . 
        (!empty($upID) ? $upID : NULL) . "')";
    
    if ($CONN->query($query))
    {
        echo "ok";
    } else
    {
        echo $CONN->error;
    }
}

?>