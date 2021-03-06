<?php
    session_start();    //session started
    $_SESSION['user']='';
    $_SESSION['userid']='';
    include "auth/connection.php";
    $conn= connect();   //store db connection in a variable
    $m= '';
    if(isset($_POST['submit'])){    //if submitted
        $uName= mysqli_real_escape_string($conn, $_POST['uname']);
        $pass= mysqli_real_escape_string($conn, $_POST['pass']);
        
        $sql= "SELECT * FROM users_info WHERE u_name='$uName' and password='$pass'";    // query for matching the username and password
        $res= $conn->query($sql);

        if(mysqli_num_rows($res)==1){
            $user= mysqli_fetch_assoc($res);
            $id= $user['id'];
            $sq= "UPDATE users_info SET last_login_time=current_timestamp() WHERE id='$id'";    //update last login time
            $conn->query($sq);
            $_SESSION['user']= $user['name'];
            $_SESSION['userid']= $user['id'];
            header('Location: dashboard.php');
        }
        else{
            $m= 'Credentials mismatch!';
        }
    }
?>


<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="logo">

        </div>
        <form method="POST">
            <div class="box bg-img">
                <div class="content">
                        <h2>Log<span> In</span></h2>
                    <div class="forms">
                        <p style="color: red; padding: 20px;"><?php if($m!='') echo $m; ?></p>
                        <div class="user-input">
                            <input name="uname" type="text" class="login-input" placeholder="Username" id="name" required>
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="pass-input">
                            <input name="pass" type="password" class="login-input" placeholder="Password" id="my-password" required>
                            <span class="eye" onclick="myFunction()">
                              <i id="hide-1" class="fas fa-eye-slash"></i>  <!-- for eye logo -->
                              <i id="hide-2" class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <button class="login-btn" type="submit" name="submit">Sign In</button>
                    <p class="new-account">Not a user? <a href="register.php">Sign Up now!</a></p>
                    <br>

                    <p class="f-pass">
                        <a href="#">forgot password?</a>
                    </p>

                </div>
            </div>
        </form>
        <script src="https://kit.fontawesome.com/c0078485ae.js" crossorigin="anonymous"></script>
    </body>
</html>

<script>
    function myFunction() {         // for login input logo feature
        var x = document.getElementById("my-password");
        var y = document.getElementById("hide-1");
        var z = document.getElementById("hide-2");

        if (x.type === "password") {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }

</script>