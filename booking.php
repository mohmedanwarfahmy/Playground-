<?php 
    session_start();
    include "db.php";
	include "init.php";
    
    $slug = $_GET['stadium'];

    // Define variables and set to empty
    $date = $start_time = $end_time = $full_name = $email = $phone = $product_id = $total = $regular_price ="";
    $errors = array();

    

    $sql = "SELECT * FROM products WHERE slug = '$slug'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1)
    {
        include $templateRoute . "header.php";
        $row = mysqli_fetch_assoc($result);
        if (isset($_POST['book'])) {
            $date           = $_POST['dateplay'];
            $start_time     = $_POST['start_time'];
            $end_time       = $_POST['end_time'];
            $numberofperson = $_POST['numberofperson'];
            $full_name      = $_POST['full_name'];
            $email          = $_POST['email'];
            $phone          = $_POST['phone'];
            $product_id     = $row['id'];
            $regular_price  = $row['regular_price'];
            $maxStadium     = $row['numberofperson'];
            $slug     = $row['name'];

            $total = (($regular_price/$maxStadium) * $numberofperson) * (str_replace(':', '.',$end_time) - str_replace(':', '.',$start_time));


            // ensure that form fields filled properly

            if(empty($date))
            {
                array_push($errors, 'Date field is required');
            }
            if(empty($start_time))
            {
                array_push($errors, 'Start Time field is required');
            }
            if(empty($end_time))
            {
                array_push($errors, 'End Time field is required');
            }
            if(empty($numberofperson))
            {
                array_push($errors, 'Number of person field is required');
            }
            if($numberofperson == 0)
            {
                 array_push($errors, 'The lowest value to be entered in Numer of person is 1');
            }
            if(empty($full_name))
            {
                array_push($errors, 'Full Name field is required');
            }
            if(empty($email))
            {
                array_push($errors, 'E-Mail field is required');
            }
            if(empty($phone))
            {
                array_push($errors, 'phone Number field is required');
            }

            $sql = "SELECT * FROM booking 
                    WHERE date = '$date' 
                    AND start_time = '$start_time' 
                    AND end_time = '$end_time'";
                
            $finaly = mysqli_query($conn, $sql);      
            $enterperson = $numberofperson;
            $person = 0;
            while($data   = mysqli_fetch_assoc($finaly)){
                $person += $data['numberofperson'];
            }
            if($person != 0 && $person == $maxStadium){
                array_push($errors, 'The stadium is not available at that time ');
            }elseif($person != 0 && $enterperson > ($maxStadium - $person)){
                array_push($errors, 'Reservations are available for '.($maxStadium - $person).' people only  ');
            }elseif($enterperson > $maxStadium)
            {
                array_push($errors, 'Reservations are available for '.($maxStadium).' people only  ');
            }

            $sql = "SELECT * FROM booking 
                    WHERE date = '$date'";
                
            $q = mysqli_query($conn, $sql);

            while($r  = mysqli_fetch_assoc($q)){
                if($start_time > $r['start_time'] && $start_time < $r['end_time'])
                {
                    array_push($errors, 'The stadium is not available at that time ');
                    break;
                }
            }


            // if There are no errors continue
            if(count($errors) == 0)
            {
                $sql = "INSERT INTO booking (date, start_time, end_time, numberofperson, full_name, email, phone, product_id, total,slug) VALUES ('$date', '$start_time', '$end_time', '$numberofperson', '$full_name', '$email', '$phone', '$product_id', '$total','$slug')";

                if (mysqli_query($conn, $sql)) {
                  echo "<center><div class='alert alert-success'>Reservation has been successfully</div></center>";
                } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }       
        ?>
        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-content-right">
                            <div class="product-breadcroumb">
                                <a href="home.php">Home</a>
                                <span><?php echo $row['name'] ?></span>
                            </div>   
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="layouts/img/<?php echo $row['image'] ?>" alt="" style="width: 100%; height: 600px;">
                                        </div> 
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">  
                                    <center>
                                        <?=_BOOK_NOWWW?>
                                    </center>
                                    <?php include "errors.php"; ?>
                                    <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                                        
                                        
                                        <div class="form-group">
                                            <label for="date">Choose Date</label>
                                            <input type="date" id="date" name="dateplay"
                                                class="form-control" 
                                                min="2021-01-01" max="2021-12-31" 
                                                onchange="showOrders(this.value, <?php echo $row['id'] ?>, <?php echo $row['numberofperson'] ?>)">
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Booking Status</label>
                                            <select class="form-control" id="booking_status" onchange="showNumberOfPerson(this.value,  <?php echo $row['numberofperson'] ?>)">
                                                <option value="">...</option>
                                                <option value="team">A Team</option>
                                                <option value="numberofperson">Number Of Persons</option>
                                            </select>
                                        </div>
                                        <div id="info" style="display: none;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_time">Start From</label>
                                                    <input type="time" id="start_time" name="start_time" class="form-control" 
                                                    onchange="showTotal(1)" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end_time">End At</label>
                                                    <input type="time" id="end_time" name="end_time" class="form-control" onchange="showTotal(1)" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="num_of_person" style="display: none;">
                                                <div class="form-group">
                                                    <label for="numberofperson">Number Of person</label>
                                                    <input type="number" name="numberofperson" id="numberofperson" class="form-control" max="<?php echo $row['numberofperson'] ?>" placeholder="Number of person" min="1" style="width: 100%;"  
                                                    onchange="showTotal(this.value)">
                                                </div>
                                            </div>

                                            <input type="hidden" id="max" value="<?php echo $row['numberofperson'] ?>">
                                            <input type="hidden" id="price" value="<?php echo $row['regular_price'] ?>">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="full_name">Full Name</label>
                                                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name" style="width: 100%;">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">E-Mail</label>
                                                    <input type="text" name="email" id="email" class="form-control" placeholder="E-Mail"  style="width: 100%;">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"  style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="total">Total</label>
                                                    <input type="text" name="total" id="total" class="form-control" placeholder="Total" value=""  style="width: 100%;" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <button class="btn btn-primary" name="book" type="submit">
                                                        Book
                                                    </button>
                                        
                                                
                                                
                                        
                                            </div>
                                            <button class="btn btn-danger" >
                                                <a href="userstadium.php">  CANCEL 
                                                 </a>
                                                 </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        <div id="txtHint">
                            <center><b>Booking info will be listed here...</b></center>
                        </div><hr>                   
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showNumberOfPerson(booking_status, max)
            {
                if(booking_status === "")
                {
                    document.getElementById('num_of_person').style.display = "none";
                    document.getElementById('numberofperson').value = "";
                }

                if(booking_status === "team")
                {
                    document.getElementById('num_of_person').style.display = "block";
                    document.getElementById('numberofperson').value = max / 2;
                    document.getElementById('numberofperson').readOnly = true;
                    showTotal(max / 2);
                }

                if(booking_status === "numberofperson")
                {
                    document.getElementById('num_of_person').style.display = "block";
                    document.getElementById('numberofperson').value = 1;
                    document.getElementById('numberofperson').readOnly = false;
                    showTotal(1);
                }
            }

            function showOrders(str, id, max) {
                 var x = document.getElementById("info");              
              if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                x.style.display = "none";
                return;
              } else {
                x.style.display = "block";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                  }
                };
                xmlhttp.open("GET","getorders.php?q="+str+"&stadium="+id+'&max='+max,true);
                xmlhttp.send();
              }
            }

            function showTotal(numberofperson)
            {
                var start_time = document.getElementById('start_time').value;
                var end_time   = document.getElementById('end_time').value;
                var maxValue   = document.getElementById('max').value;
                var price      = document.getElementById('price').value;
                var startTime   = start_time.replace(':', '.');
                var endTime     = end_time.replace(':', '.');
                if(startTime != "" && endTime != "")
                {
                    var total = ((price / maxValue) * numberofperson) * (endTime - startTime);
                    document.getElementById('total').value = total.toFixed(2) + " EGY";  
                }else{
                    var total = ((price / maxValue) * numberofperson);
                    document.getElementById('total').value = total.toFixed(2) + " EGY";     
                }
                
            }
        </script>
        <?php
        include $templateRoute . "footer.php"; 
    }else{
        echo "Not Found";
    }
?>
