

<?php


session_start();
include('server/connection.php');



//if user has already registered, then take user to account page            
if(isset($_SESSION['logged_in'])){
  header('location: index.php');
  exit;
}



if(isset($_POST['registration'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  //if passwords dont match
  if($password !== $confirmPassword){
    header('location: registration.php?error=passwords dont match');
  

  //if passwod is less than 6 char
  }else if(strlen($password) < 6){
    header('location: registration.php?error=password must be at least 6 charachters');
  

  //if there is no error
  }else{
                //check whether there is a user with this email or not
                $stmt1= $conn->prepare("SELECT count(*) FROM users where user_email=?");
                $stmt1->bind_param('s',$email);
                $stmt1->execute();
                $stmt1->bind_result($num_rows);
                $stmt1->store_result();
                $stmt1->fetch();

                //if there is a user already registrationed with this email
                if($num_rows != 0){
                  header('location: registration.php?error=user with this eamil already exists');
                  

                  //if no user registed with this email before
                }else{
                        //create a new user
                        $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password) 
                        VALUES (?,?,?)");

                        $stmt->bind_param('sss',$name,$email,md5($password));

                  

                        //if account was created successfully
                        if($stmt->execute()){
                              $user_id = $stmt->insert_id;
                              $_SESSION['user_id'] = $user_id;
                              $_SESSION['user_email'] = $email;
                              $_SESSION['user_name'] = $name;
                              $_SESSION['logged_in'] = true;
                              header('location: index.php?registration_success=You registrationed successfully');

                          //account could not be created
                        }else{

                             header('location: registration.php?error=could not create an account at the moment');

                        }



                }

              }







}





?>

<!DOCTYPE html> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Log In | </title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <header>
        <a href="#" class="logo"><img src="pictures/logo.png" class="logo-pic"></a>
    
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu </label>
    
        <nav class="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="">Face Care</a></li>
                <li><a href="">Hair Care</a></li>
                <li><a href="">Body Care</a>
                    <ul>
                        <li><a href="">Gift Offers & Promo Sets</a></li>
                        <li><a href="">Collections</a>
                           <ul>
                            <li><a href="">Royal Beauty</a></li>
                            <li><a href="">Spa Elixirs</a></li>
                            <li><a href="">Fresh Bar</a></li>
                        </ul> 
                        </li>
                    </ul>
                </li>
                <li><a href="contactus.html">Contact Us</a></li>
                <li><a href="login.php">Join Us</a></li>
    
            </ul>
        </nav>
    </header>

    
                    <!-- -->
                    <script src="js/login.js"></script>

                    <div class="form signup" onsubmit="signUpValidation()" method="POST" action="registration.php">
                        
                        <form name="signUpform" class="" action="" method="post" autocomplete="off">
                        <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>    
                        <div class="input-field">
                                <input type="text" name="name" placeholder="Enter your Name" required>
                                <i class="fa-solid fa-user"></i>
                            </div>
                
                            <div class="input-field">
                                <input type="text" name="email" placeholder="Enter your email" required>
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" placeholder="Create your password" class="password" required>
                                <i class="fa-solid fa-lock icon"></i>
                                <i class="fa-solid fa-eye-slash showhidepw"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" name="confirmPassword" class="password" placeholder="Confirm password" required>
                                <i class="fa-solid fa-lock icon"></i>
                                <i class="fa-solid fa-eye-slash showhidepw"></i>

                            </div>
                            <div class="input-field button">
                                <input type="submit" value="submit" name="register">Submit
                            </div>
                        </form>
                        <div class="login-signup">
                            <span class="text">Already a member?
                                <a href="login.php" class="text login-link">Login Now</a>
                            </span>
                        </div>

                    
                </div>
            </div>
        </div>


</body>

</html>
