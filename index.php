<?php
require __DIR__ . '\\utility\\functions.php';


$image = image_link();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-web">
    <div class="wrapper">
        <div class="column">
            <h1 class="header">Discover interesting and exclusive random comics.</h1>
            <h3 class="email-header">ENTER YOUR EMAIL</h3>
            <p>Subscribe for Exclusive Comics.</p>
            <form action = "action.php" method="post">
            <div class="flex">
                    <input type="email" name="email" class="input block" placeholder="Enter your email address" required>
                    <input type="submit" name="submit" class="button button-black" value="Get started">
                </div>
            </form>    
        </div>
    </div>

    <div class="wrapper bg-image">
        <div class="column">
            <?php echo '<a href='.$image.'><img src='.$image.' alt="comic" class="image"></a>'; ?>    
                
            <p><strong>Get exclusive random XKCD comics every five minutes on your registered email.</strong></p>
        </div>
        
    </div>

    <footer class="footer">
        <p>Copyright &copy;2021 Adil Shaikh</p>
    </footer>
    
</body>
</html>
 