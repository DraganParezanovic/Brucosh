<?php
require_once "functions/string_func.php";
require_once "functions/connection.php";
require_once "functions/uloguj.php";
require_once "functions/redirect.php";
$usernameErr = $passwordErr = $emailErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {


$username = test_input($_POST['username']);
if($username == ""){
$usernameErr = "ovo je obavezno polje";
}
$password = test_input($_POST['password']);
$password2 = test_input($_POST['password2']);
if($password != $password2)
    $passwordErr = "Sifra i ponovljenja sifra nisu iste";
if($password == ""){
$passwordErr = "ovo je obavezno polje";
}else if(strlen($password) < 8){
$passwordErr = "Najmanja dozvoljenja dužina je 8 karaktera";
}
$password = password_hash($password, PASSWORD_DEFAULT);
$email = test_input($_POST['email']);
if($email == ""){
$emailErr = "ovo je obavezno polje";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
$emailErr = "Email nije validan";
}
$sql = "SELECT * FROM USERS WHERE Email='".$email."' or Username='".$username."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result))
{
$usernameErr="Username ili Email su vec iskorisćeni";
}
if($usernameErr == "" && $passwordErr == "" && $emailErr == ""){
$sql = "INSERT INTO USERS VALUES(NULL, '".$username."', '".$password."', '".$email."', 'user')";
mysqli_query($conn,$sql);
uloguj(mysqli_insert_id($conn), "user");
redirect("index.php");
}
}

?>

<!DOCTYPE html>
<html lg="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/register.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="user">
            <header class="user__header">
                <h1 class="user__title">Sign up:</h1>
            </header>
            
            <form class="form" action = "register.php" method="post">
                <div class="form__group">
                    <input type="text" placeholder="Username" class="form__input"  name="username"/> <p id="para"><?php echo $usernameErr;?></p>
                </div>
                
                <div class="form__group">
                    <input type="email" placeholder="Email" class="form__input" name="email"/> <p id="para"><?php echo $emailErr;?></p>
                </div>
                
                <div class="form__group">
                    <input type="password" placeholder="Password" class="form__input" name="password"/> <p id="para"><?php echo $passwordErr;?></p>
                </div>
                <div class="form__group">
                    <input type="password" placeholder="Repeat Password" class="form__input" name="password2"/>
                </div><br>
                <input class="btn" type="submit" name="register"></input>
            </form>
        </div>
        <script>
            const button = document.querySelector('.btn')
const form   = document.querySelector('.form')

button.addEventListener('click', function() {
   form.classList.add('form--no') 
});
        </script>
    </body>