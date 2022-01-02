<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }
</style>

<?php
  include "db.php";

  $data = $_GET['q'];
  $stadium = $_GET['stadium'];
  $stadiumMax = $_GET['max'];


  $sql = "SELECT *, SUM(numberofperson) AS TotalRecords 
          FROM booking 
          WHERE date = '$data' 
          AND product_id = '$stadium' 
          GROUP BY start_time 
          ORDER BY start_time ASC";
  $result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result) > 0)
  {
    echo "<center><b>Bookings that day</b></center>
    <table id='customers'>
    <tr>
    <th>Date</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Number Of Preson</th>
    <th>Status</th>
    <th><a href='payment.php'style='color: green;'>payment </a></th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['start_time'] . "</td>";
      echo "<td>" . $row['end_time'] . "</td>";
      echo "<td>" . $row['TotalRecords'] . "</td>";
      if($row['TotalRecords'] == $stadiumMax)
      {
        echo "<td style='color: red;'>UnAvailable</td>";
        echo "<td style='color: green;'><a href='payment.php'>pay now</a></td>";
      }else{
        echo "<td style='color: green;'>Available</td>";
        echo "<td style='color: green;'><a href='payment.php'>pay now</a></td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }else{
    echo "<center>
        <p>There are no reservations at this stadium for that day yet...</p>
    </center>";
  }
?>