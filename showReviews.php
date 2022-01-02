<style type="text/css">
	.cm-7{
		width: 60%;
	    background-color: #babac8;
	    border-radius: 0px 25px 25px 20px;
	    padding: 10px 5px;
	    font-family: sans-serif;
	    color: black;
	}
</style>

<?php 


include "db.php";

$product_id = $_GET['product_id'];

$sql = "SELECT * FROM review WHERE product_id = '$product_id' ORDER BY id DESC LIMIT 5";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result)) {
  echo "<div style='margin-bottom: 10px;'>
  		<div style='display: inline-block; margin-right: 5px;  position: relative;'>
  			<img src='layouts/img/default.png'  width='50' height='50' alt='' style='border-radius: 50px;'>
  			<strong style='margin-top: -10px; margin-left: 5px; color: black'>"
  			.  $row['name'] .
  			"</strong>
  			<div style='margin-left: 60px; margin-top: -10px;' class='cm-7'>
  			<p style'font-family: sans-serf'>"
  			. $row['comment'] .
  			"
  			</p>
  			</div>
  		</div>
  </div>";
}
}else{
echo "<center>
    <p>No Reviews Yet...</p>
</center>";
}
