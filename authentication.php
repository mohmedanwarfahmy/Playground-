<?php
    include('connection.php');
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $pass_id = $_POST['pass_id'];   
    session_start();

        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $pass_id = stripcslashes($pass_id);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);
        $pass_id = mysqli_real_escape_string($con, $pass_id);

        $sql = "select *from passowner where username = '$username' and password = '$password' and pass_id='$pass_id'";

        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            $_SESSION['msg'] ="login successfully." ;
            $_SESSION['alert'] ="alert alert-success" ;
            $_SESSION['product_id'] = $pass_id;
            header("location: stadiumowner.php");
            }
           else{
            $_SESSION['msg'] ="login should not empty." ;
            $_SESSION['alert'] ="alert alert-warning" ;
            header("location: owner.php");
           }

?>


