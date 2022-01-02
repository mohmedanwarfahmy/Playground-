<?php
include "db.php";
include "init.php";
// session_start();
// echo $_GET['stadium'];
// die();
// if(session_status())
if(session_id() == '')
session_start();
if (isset($_GET['stadium']))
    $_SESSION['stadium'] = $_GET['stadium'];
// elseif(isset($_SESSION['stadium']))
// echo $_SESSION['stadium'];
$slug = $_SESSION['stadium'];

// $slugName = $_SESSION['stadium'];
$sql = "SELECT * FROM products WHERE slug = '$slug'";

$result = mysqli_query($conn, $sql);
// echo $_SESSION['lang'];
if (mysqli_num_rows($result) == 1) {
    include $templateRoute . "header.php";
    $row = mysqli_fetch_assoc($result);
    // Selected related data
    $query = "SELECT * FROM products WHERE slug != '$slug' LIMIT 6";
    $data = mysqli_query($conn, $query);
?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="success"></div>
                </div>
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="home.php"><?=_HOME_P?></a>
                            <span><?php echo $row['name'] ?></span>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="layouts/img/<?php echo $row['image'] ?>" alt="" style="width: 100%; height: 500px;">
                                    </div>
                                    <a class="add_to_cart_button" href="booking.php?stadium=<?php echo $row['slug'] ?>" style="padding: 10px 60px; width: 50%; text-align: center;">
                                        <?=_BOOK_P?>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $row['name'] ?></h2>
                                    <p><?php echo $row['short_description'] ?></p>
                                    <p style="color: green">
                                        <?=_NUMBER_P?> <?php echo $row['numberofperson'] ?>
                                    </p>

                                    <div class="product-inner-price">
                                        <span><?=_PRICE_P?> : </span>
                                        <ins><?=_DOLAR?><?php echo $row['regular_price'] ?></ins>
                                    </div>

                                    <div role="tabpanel" style="margin-top: 10px;">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?=_DESCRIPTION_P?></a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?=_REVIEW_PP?></a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2><?=_STADIUM_DESCRIPTION_P?></h2>
                                                <p><?php echo $row['description'] ?></p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2><?=_REVIEWS_P?></h2>
                                                <div class="submit-review">
                                                    <input type="hidden" name="product_id" id="product_id" value="<?php echo $row['id'] ?>">
                                                    <p><label for="name"><?=_NAME_P?></label> <input name="name" id="name" type="text"></p>
                                                    <p><label for="email"><?=_EMAIL_P?></label> <input name="email" id="email" type="email"></p>
                                                    <p><label for="review"><?=_YOUR_REVIEW_P?></label> <textarea name="comment" id="comment" id="" cols="30" rows="10"></textarea></p>
                                                    <button type="submit" onclick="insertReview()"><?=_SAVE?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin: 20px 0;">
                            <div class="col-md-12">
                                <div>
                                    <h3 style="font-weight: bold;"><?=_REVIEW?></h3>
                                    <hr>
                                </div>
                                <div id="tableInfo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (mysqli_num_rows($data) > 0) {
            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title"><?=_POPULAR_STADIUM_P?></h2>
                            <div class="related-products-carousel">
                                <?php
                                while ($rows = mysqli_fetch_assoc($data)) { ?>
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <a href="product.php?stadium=<?php echo $rows['slug'] ?>">
                                                <img src="layouts/img/<?php echo $rows['image']  ?>" alt="" style="width: 100%; height: 300px !important;">
                                            </a>
                                        </div>

                                        <h2>
                                            <a href="product.php?stadium=<?php echo $rows['slug'] ?>">
                                                <?php echo $rows['name'] ?>
                                            </a>
                                        </h2>

                                        <div class="product-carousel-price">
                                            <span>Price : </span>
                                            <ins>$<?php echo $rows['regular_price'] ?></ins>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <script>
        function showReviews() {
            var product_id = document.getElementById('product_id').value;
            if (product_id == "") {
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("tableInfo").innerHTML = this.responseText;
                    }
                };
            }
            xmlhttp.open("GET", "showReviews.php?product_id=" + product_id, true);
            xmlhttp.send();
            // console.log("recieved");
        }

        showReviews();

        function insertReview() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var comment = document.getElementById('comment').value;
            var product_id = document.getElementById('product_id').value;
            if (name == "" || email == "" || comment == "" || product_id == "") {
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('name').value = "";
                        document.getElementById('email').value = "";
                        document.getElementById('comment').value = "";
                        document.getElementById("success").innerHTML = this.responseText;
                        showReviews();
                    }
                };
                console.log(xmlhttp);
                xmlhttp.open("POST", "saveReview.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("name=" + name + "&email=" + email + "&comment=" + comment + "&product_id=" + product_id);



                return false;
            }
        }
    </script>
<?php
    include $templateRoute . "footer.php";
} else {
    echo "NOT Found";
}

mysqli_close($conn);
?>