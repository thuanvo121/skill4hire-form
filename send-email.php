<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    echo "<button onclick=\"window.location.href='logout.php';\">log out</button></br>";
    $emailType=$_SESSION['emailType'];


    if($emailType==="newAccount"){
        echo "<h2>Create New Account</h2></br>
        <img src='https://blog.hubspot.com/hs-fs/hubfs/how-to-do-email-marketing.jpg?width=893&height=600&name=how-to-do-email-marketing.jpg'>";
    };
    
    if($emailType==="lostPassword"){
    echo "<h2>Lost your Password??</h2></br>
    <img src='https://www.ouinolanguages.com/new/wp-content/uploads/2017/09/ques15.jpg'>";
    }
    ?>
</body>
</html>