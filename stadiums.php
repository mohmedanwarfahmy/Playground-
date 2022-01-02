<?php
include "db.php";
include "init.php";
include $templateRoute . "header.php";
if(session_id() == '')
 session_start();

?>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-breadcroumb">
                    <a href="home.php"><?= _HOMES ?></a>
                    <span><?= _STADIUMSS ?></span>
                </div>
            </div>
            <?php
            if (isset($_GET['search']) && $_GET['search'] != "") {
                $search = $_GET['search'];
                $sql = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY RAND()";
            } else {
                $sql = "SELECT * FROM products ORDER BY RAND()";
            }
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {

                    // echo $row['image'];
                    // die();
            ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="product.php?stadium=<?php echo $row['slug']; ?>">
                                    <img <?php if (is_readable("layouts/img/" . $row['image'])) echo "src=layouts/img/" . $row['image'];
                                            else echo "src=" . '"' . $row['image'] . '"'; ?> alt="" style="width: 100%; height: 300px !important;">
                                </a>
                            </div>
                            <h2><a href=""><?php echo $row['name'] ?></a></h2>
                            <span style="font-weight: bold;"><?php echo substr($row['short_description'], 0, 25) ?>...</span>
                            <div class="product-carousel-price">
                                <ins>$<?php echo $row['regular_price']  ?></ins>
                            </div>

                            <div class="product-option-shop">
                                <a class="add_to_cart_button" href="booking.php?stadium=<?php echo $row['slug']; ?>">
                                    <?= _BOOK_N ?>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Not Found Stadiums";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

<?php include $templateRoute . "footer.php";  ?>