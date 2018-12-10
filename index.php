<?php
include("config/DataBaseCon.php");
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    if (strlen($myusername) > 70 || strlen($mypassword) > 40) {
        $error = "Too Long Input";
    } else {
        $mypassword = strip_tags($mypassword);
        $myusername = strip_tags($myusername);
        $database = new DataBaseCon();
        $conn = $database->connection();
        $type = 'admin';

        $query = 'Select * from users where email = ? and password = ? ';
        $stmt = $conn->prepare($query);

        $stmt->bindParam(1, $myusername, PDO::PARAM_STR);
        $stmt->bindParam(2, $mypassword, PDO::PARAM_STR);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num == 1) {
            $_SESSION['email'] = $myusername;
            $_SESSION['type'] = "admin";

            header("location: searchForm.php");
        } else {
            $error = "Your Login Name or Password is invalid";
        }
    }

}

?>


<html>

<head>
    <title>Login Page</title>

    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            margin-top: 100px;
        }

        label {
            font-weight: bold;
            width: 100px;
            font-size: 14px;
        }

        .box {
            border: #666666 solid 1px;
        }
    </style>

</head>

<body bgcolor="#FFFFFF">

<div align="center">
    <div style="width:300px; border: solid 1px #333333; " align="left">
        <div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style="margin:30px">

            <form action="" method="post">
                <label>UserName :</label><input type="text" name="username" class="box"/><br/><br/>
                <label>Password :</label><input type="password" name="password" class="box"/><br/><br/>
                <input type="submit" value=" Submit "/><br/>
            </form>

            <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </div>

    </div>

</div>

</body>
</html>