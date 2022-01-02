<?php include"headerownerstyle.php" ?> 
<html>
<head>
 <title>  confirmed orders </title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> 
 <style>
 body{
     background-color: whitesmoke;

 }
 input{
     width: 40%;
     height: 5%;
     border: 1px;
     border-radius: 05%;
     padding: 8px 15px 8px 15px;
     margin: 10px 0px 15px 0px;
     box-shadow: 1px 1px 2px 1px gray;


 }
 #sub{
     padding: auto;
     background-color: green;
     margin: 10px;
 }
 
#start{
    padding: 8px 15px 8px 15px;
     margin: .4rem 0; 
}

  </style> 
</head>
<body>









<!--############################################################################################################  -->



<!--############################################################################################################ -->
 <center>
 
 <form action="" method="POST"> 
 <input type="text" name="product_id" placeholder="Enter ID TO playGround"/> 
 <input type="date" id="start" name="date"  min="2021-01-01" max="2021-12-31"/> <br/>
       
 <button class="btn btn-default" type="submit"><a href="idowner.php">search</a></button>
 <?php 
 $connection = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($connection,'stadium');
 if(isset($_POST['search']))
 {
$product_id = $_POST['product_id'];
$date = $_POST['date'];
$query = "SELECT * FROM booking where product_id='$product_id' ";
$query = "SELECT * FROM booking where date='$date' ";
$query_run = mysqli_query($connection,$query);


while($row = mysqli_fetch_array($query_run))
{

?>




<table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">start_time</th>
      <th scope="col">end_time</th>
      <th scope="col">full_name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">numberofperson</th>
      <th scope="col">total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['start_time'] ?></td>
      <td><?php echo $row['end_time'] ?></td>
      <td><?php echo $row['full_name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['numberofperson'] ?></td>
      <td><?php echo $row['total'] ?></td>
     
      
      
    </tr>
    
  </tbody>
</table>

<form action="" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>" />
    <input type="hidden" name="date" value="<?php echo $row['date'] ?>" />
    
    </form>
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" >&times;</span>
</button>
</div>



 </center>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>




</body>
</html>
