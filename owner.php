<?php include "headerowner2.php" ?>

<?php

    
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";

}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location:loginowner.php");
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Home</title>

        <link rel="stylesheet" type="text/css" href="styleowner.css">
    </head>
    <body>


    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->

    </div>

    <div id="frm">
        <h7>Please enter data to view more</h7>
        </br>
        <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">
            <p>
                <label> UserName: </label>
                <input type="text" id="user" name="user"/>
            </p>
            <p>
                <label> Password: </label>
                <input type="password" id="pass" name="pass"/>
            </p>

            <p>
                <label> ID: </label>
                <input type="text" id="id" name="pass_id" placeholder="Enter ID TO playGround"/>
            </p>


            <p>
                <input type="submit" id="btn" value="view" name="submit"/>
            </p>


        </form>


        <?php

        ?>

    </div>
    <script>
        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;
            if (id.length == "" && ps.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>

    <!-- Notification -->

<script>

function showNotification(){
    const notification = new Notification ("اهلا بك في ملعبك..",{
        body: " نود تذكيرك انه بمكانك إلغاء الحجز بعد خمس دقاثق فقط من الوقت المسجل  !"
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


    </body>
    </html>
<?php include "footer.php" ?>