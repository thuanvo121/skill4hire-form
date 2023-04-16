<?php
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: problem.php");
        exit;
    }
    $formComplete = true;
    $errorMsg=[];
    if(isset($_POST["submit"]) && $_POST["submit"] === "submit"){
        $gender=htmlspecialchars($_POST["gender"] ?? "", ENT_QUOTES);
        $fname=htmlspecialchars($_POST["fname"] ?? "", ENT_QUOTES);
        $lname=htmlspecialchars($_POST["lname"] ?? "", ENT_QUOTES);
        $role=htmlspecialchars($_POST["role"] ?? "", ENT_QUOTES);

        if(trim($fname)===""){
            $formComplete=false;
            array_push($errorMsg,"Please input your first name");
        }
        if(!in_array($role, ["admin","manager","ceo"])){
            $formComplete=false;
            array_push($errorMsg,"Please choose your role");
        };
        if(!$formComplete){

            echo "<h2>Errors:</h2><ul>";
            foreach($errorMsg as $errorMsg){
                echo "<li>$errorMsg</li>";
            }
            echo "</ul>";
        } else {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION['name'] = $fname;
            $_SESSION['role'] = $role;
            header("location:problem.php"); 
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to IT System</title>
</head>
<body>
    <div class="container">
        <div class="container-form">
            <h1>Welcome To Your IT Support System</h1>
            <form action="#" method="post">
                <select name="gender" id="gender">
                    <option value="male">Mr.</option>
                    <option value="female">Mrs.</option>
                </select>
                <input type="text" name="fname" id="fname" placeholder="First Name">
                <input type="text" name="lname" id="lname" placeholder="Last Name">
                <select name="role" id="role">
                    <option value="">Your role</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="ceo">CEO</option>
                </select>
                <input style="background-color:blue; color:white" type="submit" name="submit" value="submit" id="submit">
            </form>
        </div>
    </div>
</body>
</html>
