<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="signinstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="login-container">
        <div class="left">
            <div class="heading">
                <h1>Sign In</h1>
            </div>
            <form id="login-form">
                <label for="" class="labelleft">Username</label>
                <br>
                <input type="text" placeholder="Username" class="leftbuttons" id="username" name="username">
                <br>
                <label for="" class="labelleft">Password</label>
                <br>
                <input type="password" placeholder="Password" class="leftbuttons" id="password" name="password">
                <br>
                <input type="submit" name="Sign-In" class="buttonsubmit" value="Sign-In">
                <h5 class="ptext">Don't Have An Account? <span><a href="index.html" class="loginclass">Sign-Up</a></span></h5>
            </form>
        </div>

        <div class="right">
            <img src="./assets/signinlogo.svg">
        </div>
    </div>
    <div id="output"></div>
    <div id="response"></div>

    </body>
    <script>
        $(document).ready(function(){
            $('#login-form').submit(function(event){
                event.preventDefault();
               var formdata = {
                username : $('#username').val(),
                password :$('#password').val()
                };
                $.ajax({
                    type:'POST',
                    url:"php_backend/login_backend.php",
                    data: formdata,
                    success: function(response,username){
                        const result = JSON.parse(response);
                        if (result.status =='success') {
                            localStorage.setItem('username', result.username);
                            window.location.href = 'users.php';
                        } else {
                            alert("Login Failed");
                        }
                    },
                    error: function(){
                        alert("An error occurred. Please try again.");
                    }
                })
            })


        })
    </script>
</html>
