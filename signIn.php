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

<body class="auth">
    <!-- nAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Главная<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signIn.php">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="cart.php">Корзина</a>
                </li>

            </ul>
            <div class="phone">
                +7-288-8381-213
                <img class="phone-img" src="./Images/cell-phone.png" alt="cell-phone" width="20px">
            </div>
            <div class="registration nav-item">
                <a href="registration.php">Регистрация</a> |<a href="signIn.php"> Вход</a>
            </div>
            <div>
                <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Search...">
                    <a href="#" class="search_icon"><i class="glyphicon glyphicon-search"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- nAV -->
    <main class="container">
        <form class="reg-inputs auth-inputs" action="signIn.php" method="post">
            <div class='reg-head'>
                <h3>Авторизация</h3>
            </div>
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин">
            </div>
            <div class="form-group">
                <label for="pass">Пароль</label>
                <input type="text" class="form-control" name="pass" id="pass" placeholder="Введите логин">
            </div>
            <button type="submit" class="btn btn-primary">Вход</button>
            <!-- <label for="login">Логин</label>
            <input type="text" name="login" id="login">

            <label for="pass">Пароль</label>
            <input type="text" name="pass" id="pass">

            <button type="submit">Вход</button> -->
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