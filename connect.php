<?php
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tickets = $_POST['tickets'];
    $type = $_POST['type'];
    $message = $_POST['message']

    //Database connection
    $conn = new mysqli ('localhost','root','','testdb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(name, address, tickets, type, message)
            values(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss",$name, $address, $tickets, $type, $message);
        $stmt->execute();
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }
?>