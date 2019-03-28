<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Authorization</title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/Header.css" />
    <link rel="stylesheet" href="./css/font-glyphicons.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- nAV -->
    <?php
    include("nav.php")
    ?>
    <!-- nAV -->
    <main class="container">
        <form action="signIn.php" method="post">

            <label for="login">Логин</label>
            <input type="text" name="login" id="login">

            <label for="pass">Пароль</label>
            <input type="text" name="pass" id="pass">

            <button type="submit">Вход</button>
        </form>
    </main>

    <?php 
    session_start();
    $log = false;

    if (isset($_POST['login']) && isset($_POST['pass'])) {
            $user = 'root';
            $password = 'root';
            $db = 'libraria';
            $host = 'localhost';
            $port = 3307;

            $link = mysqli_connect(
                "$host:$port",
                $user,
                $password,
                $db
            );

            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $query = "select * from `users` where  login = '$login' and pass = '$pass';";
            $res = mysqli_query($link, $query);
            if (mysqli_num_rows($res) > 0) {
                setcookie("userLogin", $login);
                // $_SESSION['userLogin'] = $login;
                echo "<script>alert('Авторизация прошла успешно.Вы будете перенаправлены на главную страницу');</script>";
                header('Refresh: 0.3;url = http://localhost/Libraria/AuthorzdIndex.php');
            } else {
                echo "<script>alert('Введены неверные данные');</script>";
            }
            mysqli_close($link);
        }
    ?>
    <!-- Footer -->
    <?php
    include("footer.php")
    ?>
    <!-- Footer -->
    <script src="./js/registration.js"></script>
</body>

</html> 