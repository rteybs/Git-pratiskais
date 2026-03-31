<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color:rgb(169, 182, 178);
            display: flex;
            flex-direction: column;
            align-items: center;

        }
        h1{
            color:rgb(49, 53, 85);
        }
        input{
            display: block;
            margin: 10px;
            padding: 10px;
            border-radius: 10px;
            
        }
        button{
            padding: 10px;
            border-radius: 10px;
            background-color:rgb(49, 53, 85);
            color: white;
            font-weight: bold;
        }

    </style>

    <?php
        $message = "";

        if (isset($_POST['SubmitBtn'])) {

        $user = $_POST['UserNameField'] ?? "";
        $pass = $_POST['PassWordField'] ?? "";
        $email = $_POST['EmailField'] ?? "";

        if (empty($user) || empty($pass) || empty($email)) {
            $message = "<p style='color:red;'>Lūdzu aizpildiet visus laukus!</p>";
        } else {
            $message = "<p style='color:green;'>Reģistrēšanās veiksmīga!</p>";
        }
    }
?>
    
    <form method="POST">
        <h1>reģistrācijas forma</h1>
        <input placeholder="Username" name="UserNameField" type="text">
        <input placeholder="Password" name="PassWordField" type="password">
        <input placeholder="Email" name="EmailField" type="email">
        <button type="submit" name="SubmitBtn">submit</button>
    </form>

    <script>
        function submit(){
            alert("Reģistrēšanās veiksmīga!");
        }

    </script>

    <?= $message ?>
</body>
</html>