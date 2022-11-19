<?php
require_once "functions/connection.php";
require_once "functions/string_func.php";
require_once "functions/uloguj.php";
require_once "functions/redirect.php";
$validationErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    if($email == '' || $password == ''){
        $validationErr = "Potrebno je uneti sva polja";
    }else{

        $sql = "SELECT * FROM USERS WHERE Email = '".$email."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(is_array($row)){

            if(password_verify($password, $row['Password'])){
                if($row['Role'] == "user"){
                    $uloga = "user";
                }else{
                    $uloga = "admin";
                }
                session_start();
                uloguj($row['UserID'],$uloga);
                redirect("index.php");
                exit();

            }else{
                $validationErr = "Pogrešna šifra";
            }

            }else{
                $validationErr= "Ne postoji korisnik sa navedenim email-om";
        }
    }

}

?>

<!DOCTYPE html>
<html lg="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<center> <h1> Student Login Form </h1> </center>
<form method="post">
    <div class="container">
        <label>Username  </label>&nbsp;
        <input type="email" placeholder="Enter Email" autofocus="" autocapitalize="none" name="email" required>
        <label>Password  </label>&nbsp;
        <input type="password" placeholder="Enter Password" autocomplete="current-password" name="password" required="" id="id_password">
        <i class="far fa-eye" id="togglePassword" style="margin-left: 5px; cursor: pointer;"></i><br>
        <p style="color:white; font-size: 12px;margin-left: 100px"><?php echo $validationErr?></p>
        <button type="submit" class="log" name="login">Login</button><br>
        <button type="button" class="cancelbtn"> Cancel</button>

    </div>
</form>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>
