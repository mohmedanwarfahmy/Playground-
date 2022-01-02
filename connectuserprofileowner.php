<?php
$profileimage = $_POST['profileimage'];
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$email = $_POST['email'];
$Username = $_POST['Username'];
$password = $_POST['password'];
$Confirmpassword = $_POST['Confirmpassword'];

  

$conn = new mysqli ('localhost', 'root' ,'' , 'stadium' );
if($conn->connect_error){

    die('Connection Failed :' .$conn->connect_error);

}else{
    $stmt = $conn->prepare("insert into profile(profileimage, Firstname, Lastname, email, Username, password ,Confirmpassword )
    values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $profileimage, $Firstname , $Lastname , $email, $Username, $password, $Confirmpassword );
    $stmt->execute();
    header("location:userprofileowner.php");
    $stmt->close();
    $conn->close();
}
 ?>

