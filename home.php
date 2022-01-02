<?php
include "db.php";
include "init.php";


?>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();//
    $url = "./index.php";
    header("Location: $url");
}

?>
<?php
session_start();

// Set Language variable
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

// Include Language file
if (isset($_SESSION['lang'])) {
    include "lang_" . $_SESSION['lang'] . ".php";
} else {
    include "lang_en.php";
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
    <title><?= _TITLE ?></title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="layouts/css/owl.carousel.css">
    <link rel="stylesheet" href="layouts/style.css">
    <link rel="stylesheet" href="layouts/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
</body>
<script>
    function changeLang() {
        document.getElementById('form_lang').submit();
    }
</script>


<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="login.html"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>-->
            </div>


            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <!-- <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>-->



                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="home.php">P<span>layGroun</span>D</a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <div class="phppot-container">
                        <!--languages-->
                        <form method='get' action='' id='form_lang'> <?= _SELECT_LANGUAGE ?> <select name='lang' onchange='changeLang();'>
                                <option value='en' <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
                                                        echo "selected";
                                                    } ?>>English</option>
                                <option value='ar' <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                                        echo "selected";
                                                    } ?>>العربيه</option>
                            </select>
                        </form>

                        <div class="page-header">
                            <span class="login-signup"><a href="logout.php"><?= _LOGOUT ?></a></span>
                        </div>
                        <div class="page-content"><?= _WELCOME ?> <?php echo $username; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php"><?= _HOME ?></a></li>
                    <li><a href="stadiums.php"><?= _STADIUMS ?></a></li>
                    <!-- <li><a href="single-product.html">Single product</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li> -->
                        
                    <li><a href="userprofile.php"><?= _CONTACT ?></a></li>
                    <li><a href="confirmed.php"><?= _confirmed ?></a></li>
                    <li>
                        <form action="stadiums.php" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="search" placeholder=<?= _SEARCH_TEXT ?> style="margin: 15px 0 0 0;">
                                </div>
                                <div class="col-md-4">
                                    <button style="margin: 16px 0 0 90px;"><?= _SEARCH_ICON ?></button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?= _SUB_TITLEE ?></h3><br>
            </div>
            <?php
            // Select Products form database
            $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 12";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="product.php?stadium=<?php echo $row['slug']; ?>">
                                    <img src="layouts/img/<?php echo $row['image']; ?>" alt="" style="width: 100%; height: 300px !important;">
                                </a>
                            </div>
                            <h2><a href=""><?php echo $row['name'] ?></a></h2>
                            <span style="font-weight: bold;"><?php echo substr($row['short_description'], 0, 25) ?>...</span>
                            <div class="product-carousel-price">
                                <ins><?php echo $row['regular_price']  ?></ins>
                            </div>

                            <div class="product-option-shop">
                                <a class="add_to_cart_button" href="booking.php?stadium=<?php echo $row['slug'] ?>">
                                    <?= _HOME_BOOK ?>
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
            <div class="col-md-12">
                <center>
                    <a href="stadiums.php" class="btn btn-primary btn-lg"><?= _MORE_STADIUMSS ?></a>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- Notification -->

<script>

    function showNotification(){
        const notification = new Notification ("اهلا بك في ملعبك..",{
            body: "نود تذكيرك انه بمكانك إلغاء  الحجز بعد خمس دقاثق فقط من الوقت التسجيل  !"
        });
    }

        console.log(Notification.permission );

        if (Notification.permission === "granted"){
            showNotification();
        }else if (Notification.permission !== "denied"){


          Notification.requestPermission().then(permission =>{
              if (permission === "granted") {
                showNotification();
              }
          });

        
    }
    </script>

<?php include $templateRoute . "footer.php";  ?>
</body>
