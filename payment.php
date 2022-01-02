<?php
if(session_id() == '')
session_start();

// Set Language variable
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    // echo $_SESSION['lang'];
    // die();
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
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> playground </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>playground</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
    <script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

    <script type="application/javascript">
    $(document).ready(function () {

        var select = function () {
            priceCal();
        };
        $("#starthours").timepicker({
            onSelect: select,
            onUpdate: select
        });
        $("#endhours").timepicker({
            onSelect: select,
            onUpdate: select
        });
    });

    $(function () {
        $('#Starthours').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia'
        });
    });

    $(function () {
        $('#endhours').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia'
        });
    });
    
</script>
   
<style> 

  .card {
    margin: auto;
    width: 600px;
    padding: 3rem 3.5rem;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}

@media(max-width:767px) {
    .card {
        width: 90%;
        padding: 1.5rem
    }
}

@media(height:1366px) {
    .card {
        width: 90%;
        padding: 8vh
    }
}

.card-title {
    font-weight: 700;
    font-size: 2.5em
}

.nav {
    display: flex
}

.nav ul {
    list-style-type: none;
    display: flex;
    padding-inline-start: unset;
    margin-bottom: 6vh
}

.nav li {
    padding: 1rem
}

.nav li a {
    color: black;
    text-decoration: none
}

.active {
    border-bottom: 2px solid black;
    font-weight: bold
}

input {
    border: none;
    outline: none;
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    width: 100%;
    min-width: unset;
    background-color: transparent;
    border-color: transparent;
    margin: 0
}

form a {
    color: grey;
    text-decoration: none;
    font-size: 0.87rem;
    font-weight: bold
}

form a:hover {
    color: grey;
    text-decoration: none
}

form .row {
    margin: 0;
    overflow: hidden
}

form .row-1 {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    overflow: hidden
}

form .row-2 {
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem
}

form .row .row-2 {
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem
}

form .row .col-2,
.col-7,
.col-3 {
    display: flex;
    align-items: center;
    text-align: center;
    padding: 0 1vh
}

form .row .col-2 {
    padding-right: 0
}

#card-header {
    font-weight: bold;
    font-size: 0.9rem
}

#card-inner {
    font-size: 0.7rem;
    color: gray
}

.three .col-7 {
    padding-left: 0
}

.three {
    overflow: hidden;
    justify-content: space-between
}

.three .col-2 {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    width: fit-content;
    overflow: hidden
}

.three .col-2 input {
    font-size: 0.7rem;
    margin-left: 1vh
}

.btn {
    width: 100%;
    background-color: rgb(65, 202, 127);
    border-color: rgb(65, 202, 127);
    color: white;
    justify-content: center;
    padding: 2vh 0;
    margin-top: 3vh
}

.btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

.btn:hover {
    color: white
}

input:focus::-webkit-input-placeholder {
    color: transparent
}

input:focus:-moz-placeholder {
    color: transparent
}

input:focus::-moz-placeholder {
    color: transparent
}

input:focus:-ms-input-placeholder {
    color: transparent
}
</style>
</head>
<body>
    <!--LANGUAGES-->
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
                        <li><a href="home.php"><?= _HOME ?></a></li>
                        <li class="active"><a href="stadiums.php"><?= _STADIUMS ?></a></li>
                        <!-- <li><a href="single-product.html">Single product</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li> -->
                        <li><a href="userprofile.php"><?= _CONTACT ?></a></li>
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
    
   
    <div class="card mt-50 mb-50">
        <div class="card-title mx-auto"> Settings </div>
        <div class="nav">
            <ul class="mx-auto">
                <li><a href="#">Account</a></li>
                <li class="active"><a href="#">Payment</a></li>
            </ul>
        </div>
        <form> <span id="card-header">Saved cards:</span>
            <div class="row row-1">
                <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /></div>
                <div class="col-7"> <input type="text" placeholder="**** **** **** 3193"> </div>
                <div class="col-3 d-flex justify-content-center"> <a href="#">Remove card</a> </div>
            </div>
            <div class="row row-1">
                <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" /></div>
                <div class="col-7"> <input type="text" placeholder="**** **** **** 4296"> </div>
                <div class="col-3 d-flex justify-content-center"> <a href="#">Remove card</a> </div>
            </div> <span id="card-header">Add new card:</span>
            <div class="row-1">
                <div class="row row-2"> <span id="card-inner">Card holder name</span> </div>
                <div class="row row-2"> <input type="text" placeholder="Bojan Viner"> </div>
            </div>
            <div class="row three">
                <div class="col-7">
                    <div class="row-1">
                        <div class="row row-2"> <span id="card-inner">Card number</span> </div>
                        <div class="row row-2"> <input type="text" placeholder="5134-5264-4"> </div>
                    </div>
                </div>
                <div class="col-2"> <input type="text" placeholder="Exp. date"> </div>
                <div class="col-2"> <input type="text" placeholder="CVV"> </div>
            </div> <button class="btn d-flex mx-auto"><b>Add card</b></button>
        </form>
    </div>
                
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6">
                    <div class="footer-about-us">
                        <h2>P<span>layGroun</span>D</h2>
                        <p><?=_DECREPTION_FOOTER?></p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
              <!--  <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                -->
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
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
                    </div>
                </div>
                
               <!-- <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div> <!-- End footer top area -->
    
   <!-- <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p> </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="layouts/js/owl.carousel.min.js"></script>
    <script src="layouts/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="layouts/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="layouts/js/main.js"></script>
</body>
</html>