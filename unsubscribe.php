<?php 
require_once __DIR__. '\\utility\\db.php';

if(!empty($_GET['code']) && isset($_GET['code'])){
    $code = $_GET['code'];
    $query1= "SELECT * from users WHERE code='$code' and active='1'";
    $user=select_db($query1);

    if ($user){
        
        $query = "DELETE FROM users where code='$code'";
        exec_db($query);
        $message = "Unsubscribed.";
    }
    else {
        $message = "User does not exist or already unsubscribed.";
    }
}
else{
    $message = "Method Not Allowed.";
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
            
        </div>
    </div>

    <footer class="footer">
        <p>Copyright &copy;2021 Adil Shaikh</p>
    </footer>
        
    
    
    
</body>
</html>