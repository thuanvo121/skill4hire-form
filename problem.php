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
    // include 'index.php';
    session_start();
    echo "<button onclick=\"window.location.href='logout.php';\">log out</button></br>";

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location:index.php");
        exit;
    };

    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
    $emailType="";
    echo "<h2>Hello $role $name,</h2>";
    echo "</br> How can we help?</br></br>";

    if($_SESSION['role'] === "admin"){
        $emailType="newAccount";
        echo "<button onclick=\"window.location.href='send-email.php';\">Create a new account</button></br></br>";
        echo "<button onclick=\"window.location.href='isnt-working.php';\">Help! My computer goes down!</button>";
        
    };
    if($_SESSION['role'] === "manager"){
        $emailType="lostPassword";
        echo "<button onclick=\"window.location.href='send-email.php';\">I lost my password!!</button></br></br>";
        echo "<button onclick=\"window.location.href='isnt-working.php';\">Help! My computer goes down!</button>";
        
    };
    if($_SESSION['role'] === "ceo"){
        
        echo "<button onclick=\"window.location.href='phone-number.php';\">phone number??</button></br></br>";
        echo "<button onclick=\"window.location.href='isnt-working.php';\">Help! My computer goes down!</button>";

    };

    $_SESSION['emailType'] = $emailType;
    ?>
</body>
</html>