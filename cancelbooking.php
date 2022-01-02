
  <?php include 'headerownerstyle.php';
  session_start();

  ?> 
<html>
<head>
 <title>  Stadiums  </title>
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

           <center>
 
                     <form action="" method="POST"> 
                            <input type="date" id="start" name="date"  min="2021-01-01" max="2021-12-31"/> <br/>
                                                
                
                              <input type="number" id="phone" name="phone" placeholder="Enter the phone number"><br/>
                              <input type="number"  name="numberofperson" placeholder="Enter the numberofperson"><br/>
                              <input type="submit" name="search" value="Search" id="sub"/> 
                <?php

                    $connection = mysqli_connect("localhost","root","");
                       $db = mysqli_select_db($connection,'stadium');
                        if(isset($_POST['search']))
                        {
                         $product_id = $_SESSION["product_id"];
                          $date = $_POST['date'];
                       
                          $phone = $_POST['phone'];
                          $numberofperson = $_POST['numberofperson'];
                           $query = "SELECT * FROM booking WHERE product_id='$product_id' AND `date`='$date' AND `phone`='$phone' AND `numberofperson`='$numberofperson' ";
                               $query_run = mysqli_query($connection,$query);
                                 while($row = mysqli_fetch_array($query_run))
                        {
                         // print_r($row); // print contents of $row

                          
                          $time_stamp = $row['time_stamp'];
                          $_SESSION['time_stamp'] = $time_stamp;
                          
                          //echo "$time_stamp";

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
                    
                      <td>
                      
                      
                      <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Cancel
                </button>
                      <button type="button" class="btn btn-primary">Message</button>
                      
                      </td>
                      
                    </tr>
                    
                  </tbody>
                </table>


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


            <form action="stadiumowner.php" method="POST">
                    
                  
                  <div class="modal-body">

                  <input type="hidden" name="id" id="id">

                  <h4> Do you want to Delete this Data  ??</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> NO </button>
                    <a  class="btn btn-primary" href="delete2.php?id=<?php echo $row['id'];?>">Yes !! Delete it.</a>
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
