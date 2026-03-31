<?php
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        if(isset($_POST['send'])){

            $errors = [];
    
            
            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            $email = test_input($_POST['email']);
           
            
            
            if(empty($username)){
                $errors['username'] = "Lietotājvārds ir tukšs";
            }
                elseif(strlen($username) < 4){
                $errors['username'] = "Lietotājvārdam jābūt vismaz 4 rakstzīmes garam.";
                
                }
    
            if(empty($password)){
                $errors['password'] = "Parole ir tukša";
            }
                elseif(strlen($password) < 4){
                    $errors['password'] = "  Parolei jābūt vismaz 4 rakstzīmes garai.";
                } 
            
            if(empty($email)){
                    $errors['email'] = "E-pasts ir tukšs";
            }
                elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "  Nederīgs E-pasts";
                } 
    
    
                
                if(empty($errors)){
                    echo "Ievada datus datubāzē";
                };
    
                // echo "<pre>";
                // print_r($_POST);
                // echo "<pre>";
    
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body{
            background-image: url(fons.jpg);
            background-size: cover;
            background-position: center; 
            height: 100vh;                       
            display: flex;
            flex-direction: column;
            justify-content: center;        
            align-items: center;
            font-family: 'Inter', sans-serif;
            margin: 0;
        }
        .form-box{
            background: rgba(255, 255, 255, 0.94);
            padding: 40px;
            width: 800px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            position: relative;
        }
        h1{
            color: #323e68;
            font-size: 40px;
            margin-bottom: 25px
        }
        input{
            display: block;
            margin: 10px;
            padding: 10px 15px;
            border-radius: 10px;
            width: 280px;
            font-size: 20px;
            color: #262424;

        }
        #SubmitButton{
            padding: 12px;
            width: 290px;
            background-color: #323e68;
            color: white;
            font-weight: bold;
            margin-top: 15px;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 15px;
            font-size: 15px;
        }
        .error{
            color: #D60000;

        }
        .logo{
            height: 300px;
            position: absolute;
            top: 0px;
            right: 0px;
        }
        .ilustracija{
            height: 400px;
            position: absolute;
            bottom: -100px;
            right: -150px;            
        }
        .header{
            width: 880px;
            height: 50px;
            position: absolute;
            top: 0px;
            right:0px;

        }
    </style>
<body>
    
<div class="form-box">
    <h1>Reģistrācijas Forma</h1>

    <form method="POST">
    
    <?php if(isset($errors['username'])): ?>
        <div class="error"><?= $errors['username'] ?></div>
    <?php endif; ?>

    <input placeholder="Username" name="username" id="UserNameField" type="text" 
           value="<?php if (isset($username)) echo $username?>">




    <?php if(isset($errors['password'])): ?>
        <div class="error"><?= $errors['password'] ?></div>
    <?php endif; ?>

    <input placeholder="Password" name="password" id="PassWordField" type="password"
           value="<?php if (isset($password)) echo $password?>">




    <?php if(isset($errors['email'])): ?>
        <div class="error"><?= $errors['email'] ?></div>
    <?php endif; ?>

    <input placeholder="Email" name="email" id="EmailField" type="email"
           value="<?php if (isset($email)) echo $email?>">




    <input type="submit" id="SubmitButton" name="send" value="Iesniegt">

    <img src="logo.png" class="logo">
    <img src="ilustracija.png" class="ilustracija">
    <img src="header.jpg" class="header">

</form>
</div>

</body>
</html>