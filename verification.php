<?php

require_once __DIR__.'\\utility\\db.php';


if(!empty($_GET['code']) && isset($_GET['code'])){
    $not_allowed=false;
    $code = $_GET['code'];
    $query1= "SELECT * from users WHERE code='$code' and active='0'";
    $user=select_db($query1);

    $query = "UPDATE users SET active='1' WHERE code='$code'";
    if($user){
        exec_db($query); 
        $message="Email has been verified! Now you can enjoy interesting comics every 5 minutes on your mail.";
        

    }
    else{
        $message= "Invalid code or user has already verified!";
    }
    
}
else{
    $not_allowed=true;
    $message = "Method not allowed.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-web">

    <div class="wrapper">
        <div class="column content">
            <p class="message"><?php echo $message; ?></p>
            
            <a href='./' class="button button-blue">Main Page</a>
               
        </div>        
    </div>
    <footer class="footer">
        <p>Copyright &copy;2021 Adil Shaikh</p>
    </footer>
    
</body>
</html>