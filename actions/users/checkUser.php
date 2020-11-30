<?php
    //add config file to use the database class that we made
    include '../../config/config.php';

    //get the username and password from the form
    $username = $_POST['username'];

    //md5() -> encryption function used to encrypt the password
    // turns any string into 32 char
    $password = md5($_POST['password']);

    //create new obj of MysqlPdo that is in config file
    $mysqlObj = new MysqlPdo();

    //establish connection with the database
    $conn = $mysqlObj->connect();

    //SQL query
    $query = "SELECT * FROM users WHERE username=:username AND password=:password";
    $stmt = $conn->prepare($query);
    //that's how to add parameters to the query
    $stmt->bindParam(":username",$username, PDO::PARAM_STR);
    $stmt->bindParam(":password",$password, PDO::PARAM_STR);
    $stmt->execute();

    //put the result of the query in a variable ($result)
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
         echo"$result";

    /*


    if($result['username'] != ''){
        header('Location: https://www.google.com'); exit();
    }
    else{
    }
?>/*