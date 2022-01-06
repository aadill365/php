<?php 
require __DIR__ . '.\\utility\\db.php';
require __DIR__ . '.\\utility\\email.php';

if (isset($_POST['submit'])){

    $email= isset($_POST['email']) ? $_POST['email'] : '';
    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $is_exist =  select_db($query);
    if ($is_exist){
        $message = "The user with this email is already subscribed.";
    }
    else{
        
        $activationcode = md5($email.time());
        $sent=send_mail(true,$email,$activationcode);
        if ($sent){
            $query = "INSERT INTO users (email,code,active) values('$email','$activationcode','0')";
            insert_db($query);
            $message = "An email has been sent to ".$email.". Please verify your account to proceed.";

        }
        else{
            $message = "something went wrong.";
        }
        
    }

}
else{
    $message = "Method not allowed";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-web">
    <div class="wrapper">
        
            <div class="column content">
                <p class="message"><?php echo $message; ?></p>
                
                <a href="./" class="button button-blue">Go back</a>

            </div>
    </div>
    <footer class="footer">
        <p>Copyright &copy;2021 Adil Shaikh</p>
    </footer>
    
</body>
</html>