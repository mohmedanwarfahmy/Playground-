
<?php 
include 'headerusercancelstyle.php';
 session_start();
$connection = mysqli_connect("localhost","root" ,"");
$db = mysqli_select_db($connection, 'stadium');
$today = date("Y-m-d H:i:s");

$time_stamp = strtotime($_SESSION['time_stamp']);
// $time_stamp = ; 
$today = strtotime("2021-10-11 10:25:0"); 
  
// Formulate the Difference between two dates
$diff = abs($today - $time_stamp); 
  
  
// To get the year divide the resultant date into
// total seconds in a year (365*60*60*24)
$years = floor($diff / (365*60*60*24)); 
  
  
// To get the month, subtract it with years and
// divide the resultant date into
// total seconds in a month (30*60*60*24)
$months = floor(($diff - $years * 365*60*60*24)
                               / (30*60*60*24)); 
  
  
// To get the day, subtract it with years and 
// months and divide the resultant date into
// total seconds in a days (60*60*24)
$days = floor(($diff - $years * 365*60*60*24 - 
             $months*30*60*60*24)/ (60*60*24));
  
  
// To get the hour, subtract it with years, 
// months & seconds and divide the resultant
// date into total seconds in a hours (60*60)
$hours = floor(($diff - $years * 365*60*60*24 
       - $months*30*60*60*24 - $days*60*60*24)
                                   / (60*60)); 
  
  
// To get the minutes, subtract it with years,
// months, seconds and hours and divide the 
// resultant date into total seconds i.e. 60
$minutes = floor(($diff - $years * 365*60*60*24 
         - $months*30*60*60*24 - $days*60*60*24 
                          - $hours*60*60)/ 60); 
  
  
// To get the minutes, subtract it with years,
// months, seconds, hours and minutes 
$seconds = floor(($diff - $years * 365*60*60*24 
         - $months*30*60*60*24 - $days*60*60*24
                - $hours*60*60 - $minutes*60)); 
  
// Print the result
//printf("%d years, %d months, %d days, %d hours, "
  //   . "%d minutes, %d seconds", $years, $months,
    //         $days, $hours, $minutes, $seconds); 
             







if($minutes<5)
{
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    
        $query ="DELETE FROM `booking` WHERE `id` ='$id'";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
            echo '<script> alert("Data Deleted");</script>';
            header("location:stadiumuser.php");
          
        }
        else
        {
            echo '<script> alert("Data Not Deleted");</script>';
        }
       
    }  

echo"noooo";
}
else
 {
    echo '<script> alert("you canot delete after 5 minutes of booking of user");</script>';
}


if($hours<0)
{
   if(isset($_GET['id']))
   {
       $id = $_GET['id'];
   
       $query ="DELETE FROM `booking` WHERE `id` ='$id'";
       $query_run = mysqli_query($connection,$query);
   
       if($query_run)
       {
           echo '<script> alert("Data Deleted");</script>';
           header("location:stadiumuser.php");
         
       }
       else
       {
           echo '<script> alert("Data Not Deleted");</script>';
       }
      
   }  

echo"noooo";
}
else
{
   echo '<script> alert("you canot delete after 10 minutes of booking of user");</script>';
}




?>