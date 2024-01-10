<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $con = new mysqli("localhost","root","root","test");
    if($con->connect_error){
        die("Failed to Connect: ".$con->connect_error);
    } else{
        $stmt = $con->prepare("select * from user where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<h2>Login Successfull</h2>";
            }else{

            }
        }else{
            echo "<h2>Invalid email or password</h2>";
        }
    }  
?>