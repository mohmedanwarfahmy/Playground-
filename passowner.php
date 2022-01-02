

<html>  
<head>  
    <title>PHP login system</title>  

    <link rel = "stylesheet" type = "text/css" href = "style2.css">   
</head>  
<body>  
    <div id = "frm">  
        <h5>Please enter Data</h5> </br>  
        <form name="f1" action = "pass.php" onsubmit = "return validation()" method = "POST">  
        <p>  
           <label> UserName: </label>  
           <input type = "text" id ="user" name  = "user" />  
       </p>
            
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p> 
                  
            <p>     
                <input type =  "submit" id = "btn" value = "Viwe" />  
            </p>  
            
        
        
   
   </form>
   <?php 

?>

 
    </div>  
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  


  
 