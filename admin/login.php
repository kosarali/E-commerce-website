<?php
session_start();
include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
    header('location: dashboard.php');
    exit;
}

if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password =$_POST['password'];

    $stmt = $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email = ? ");

    $stmt->bind_param('s', $email,);

    if($stmt->execute()){
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();
        if($stmt->num_rows() == 1){
            $row = $stmt->fetch();

            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;

            header('location: products.php?message=Logged in successfully');

        }else{
            header('location: login.php?error=Could not find your account');
        }

        
        }else{
        //error
        header('location: login.php?error=something went wrong');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    <!--Css-->

    <link rel="stylesheet" href="assets/css/style.css"/>

    <!--Boxicons Css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Admin Login</header>

                <form action="login.php" method="post">
                    <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                    <div class="field input-field">
                        <input type="email" placeholder="Email" name="email" class="input" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" name="password" class="input" required>
                    </div>

                    <div class="field button-field" >
                        <button name="login_btn">Login</button>
                    </div>
                     <a href="../index.php">Back to Shopping</a>
                </form>
                
            </div>
        </div>
    </section>
</body>
</html>