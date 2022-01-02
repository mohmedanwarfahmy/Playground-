


  <?php include 'headerownerstyle.php';
  session_start();

  ?> 
<html>
<head>
 <title>  Stadiums  </title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> 
 
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

  </style> 
</head>
<body>

           <center>
 
                     <form action="" method="POST"> 
                            <input type="date" id="start" name="date"  min="2021-01-01" max="2021-12-31"/> <br/>
                                                
                              <input type="submit" name="search" value="Search" id="sub"/> 


                <?php

                    $connection = mysqli_connect("localhost","root","");
                       $db = mysqli_select_db($connection,'stadium');
                        if(isset($_POST['search']))
                        {
                         $product_id = $_SESSION["product_id"];
                          $date = $_POST['date'];
                           $query = "SELECT * FROM booking WHERE `date`='$date' ";
                               $query_run = mysqli_query($connection,$query);
                                 while($row = mysqli_fetch_array($query_run))
                        {

                ?>
<table id='customers'>
    <tr>
    <th>Date</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>full name</th>
    <th>number of person</th>
    <th>total</th>
    
    </tr>
   
    <td><?php echo $row['date'] ?></td>
                      <td><?php echo $row['start_time'] ?></td>
                      <td><?php echo $row['end_time'] ?></td>
                      <td><?php echo $row['full_name'] ?></td>
                  
                      <td><?php echo $row['numberofperson'] ?></td>
                      <td><?php echo $row['total'] ?></td>
                        
                


                    </form>
 

                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete the booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
            </button>
            </div>


            <form action="delete.php" method="POST">
                    
                  
                  <div class="modal-body">

                  <input type="hidden" name="id" id="id">

                  <h4> Do you want to Delete this Data  ??</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> NO </button>
                    <a  class="btn btn-primary" href="delete.php?id=<?php echo $row['id'];?>">Yes !! Delete it.</a>
                  </div>
                </div>
              </div>
            </div>
                <?php 
            }


            }
            ?>
            
            </form>
 </center>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>


<script>
$(document).ready(function (){

     $('.deletebtn').on('click',function() {
         $('#exampleModal').modal('show');

         $tr =$(this).closest('tr');

         var data = $tr.children("td").map(function (){
             return $(this).text();

         }).get();

         console.log(data);

         $('#id').val(data[0]);   
     });
});




</script>

<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/608737fd62662a09efc25d82/1f4835edd';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>                      
</body>
</html>
