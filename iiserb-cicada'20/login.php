<?php
   $servername="localhost";
    $username="enthuzia20";
    $password="iiserb@sucks";
    $dbname="cicada";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM logins WHERE name = '$myusername' and roll = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
//         session_register("name");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <link rel="icon" href="Images/cicada.png" type="image/gif">
      <title>Login</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Name  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Roll  :</label><input type = "text" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
<!--               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>-->
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>