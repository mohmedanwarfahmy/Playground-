<?php
$profileimage = $_POST['profileimage'];
$Username = $_POST['Username'];
$bio = $_POST['bio'];

  

$conn = new mysqli ('localhost', 'root' ,'' , 'stadium');
if($conn->connect_error){

    die('Connection Failed :' .$conn->connect_error);

}else{
    $stmt = $conn->prepare("insert into userprofile(profileimage,  Username, bio )
    values(?, ?, ?)");
    $stmt->bind_param("sss", $profileimage, $Username, $bio);
    $stmt->execute();
    //echo "profile SUccessfuly..." ;
    $stmt->close();
    $conn->close();
}
 ?>