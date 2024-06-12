<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>WILES APARTMENT</p>
            <div class="nav-button">
          
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>
     
 
<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->
 
        <div class="login-container" id="login">
            <div class="top">
                <span>Welcome Back Admin! Please</span>
                <header>Log In</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Admin email" id="email">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Admin passwords" id="password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
            <button type="submit" name="login" class="btn btn-success btn-block">Log In</button>
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
 
        </div>
 
<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");
 
    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>
 
<script>
 
</script>
 
</body>
</html>