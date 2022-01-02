
<?php

include "headeruserprofile.php";



?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
<style>

body{
 background-color: #fff;   
}

*{
    font-family: 'Raleway', sans-serif;
    color : #FFF;
    
}


div h3 span{
     color : #FFF;
     font-size:14px;
}

div span {
     font-weight: 200;
}

h1{
     font-weight: 200;
}

.login_box{
    background:  #2E8B57; /* Old browsers */
    /* IE9 SVG, needs conditional override of 'filter' to 'none' */
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMTAwJSIgeDI9IjEwMCUiIHkyPSIwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjUlIiBzdG9wLWNvbG9yPSIjZjMyZDI3IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iOTklIiBzdG9wLWNvbG9yPSIjZmY2YjQ1IiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
    background: -moz-linear-gradient(45deg,   #2E8B57 5%,  #2E8B57 99%); /* FF3.6+ */
    background: -webkit-gradient(linear, left bottom, right top, color-stop(5%, #2E8B57), color-stop(99%, #2E8B57)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(45deg,   #2E8B57 5%, #2E8B57 99%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(45deg,  #2E8B57 5%, #2E8B57 99%); /* Opera 11.10+ */
    background: -ms-linear-gradient(45deg,   #2E8B57 5%, #2E8B57 99%); /* IE10+ */
    background: linear-gradient(45deg,  #2E8B57 5%, #2E8B57 99%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #2E8B57', endColorstr=' #2E8B57',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
    
    width:35%;
   /* height:70%; */
    position:absolute;
    top:15%;
    left:32.5%;
    
    -webkit-box-shadow: 0px 0px 8px 0px rgba(50, 50, 50, 0.54);
-moz-box-shadow:    0px 0px 8px 0px rgba(50, 50, 50, 0.54);
box-shadow:         0px 0px 8px 0px rgba(50, 50, 50, 0.54);
}


        
     
    }
}

.image-circle{
    border-radius: 50%;
    width: 175px;
    height: 175px;
    border: 4px solid #FFF;
    margin: 10px;
}



.follow:hover {
    background-color: #2E8B57;
    height: 80px;
    cursor:pointer;
}

.login_control{
    background-color:#FFF;
    padding:10px;
    
}

.control {
    color:#000;
    margin:10px;
}

.label {
    color:  #2E8B57;
    font-size: 18px;
    font-weight: 500;
}

.form-control{
    color: #000000 !important;
    font-size: 25px;
    border: none;
    padding: 25px;
    padding-left: 10px;
    border-bottom: 1px solid #CCC;
    margin-bottom: 10px;
    outline: none;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    box-shadow: none !important;
}

.form-control:focus{
    border-radius: 0px;
    border-bottom: 1px solid green;
    margin-bottom: 10px;
    outline: none;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    box-shadow: none !important;
}
.btn-orange{
    background-color:  #2E8B57;
    border-radius: 0px;
    margin: 5px;
    padding: 5px;
    width: 150px;
    font-size: 20px;
    font-weight: inherit;
}

.btn-orange:hover {
    background-color: #2E8B57;
    border-radius: 0px;
    margin: 5px;
    padding: 5px;
    width: 150px;
    font-size: 20px;
    font-weight: inherit;
    color:#FFF !important;
}

.line{
    border-bottom : 2px solid #F32D27;
}


.outter{
    padding: 0px;
    border: 1px solid rgba(255, 255, 255, 0.29);
    border-radius: 50%;
    width: 200px;
    height: 200px;
}
#profileDisplay{

display: block;
width: 50% ;
margin: 10px auto ;
border-radius:100% ;
padding-top: 60px;

}


</style>
<form action="userprofile.php" method="post">
<div class="container">
	<div class="row login_box">
	    <div class="col-md-12 col-xs-12" align="center">
        
            
        <img src="footballplayground.jpeg"   onclick="triggerClick()" id="profileDisplay"  />
        <div class="row">
                  <label for="profileimage">   </label> 
              <input type="file" name="profileimage" onchange="displayImage(this)" id="profileimage" style="display: none;" >
             <!--<div class="outter"><img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="image-circle"/></div>   -->
           
            <span>EGYPT</span>
	    </div>
        
       
        
        <div class="col-md-12 col-xs-12 login_control">
        <div class="control">
                    <div class="label">username</div>
                    <input  class="form-control"  type="text" id="Username" name="Username">
                </div>
                        
                <div class="control">
                    <div class="label">Bio</div>
                    <input  class="form-control"  type="text" id="bio" name="bio">
                </div>
                
                
                <div align="center">
                <button class="btn btn-orange"><a href="profile.php" style="color:white;">Edit profile</a></button>
                </div>
                <div align="center">
                <input class="btn btn-orange" value="Save Changes" type="submit">
                </div>
                
        </div>
        
        
            
    </div>
</div>
</form>
<script src="script.js"></script>
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
