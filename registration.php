<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
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

<body class="reg">
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
            <!-- <div>
                <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Search...">
                    <a href="#" class="search_icon"><i class="glyphicon glyphicon-search"></i></a>
                </div>
            </div> -->
        </div>
    </nav>
    <!-- nAV -->


    <main class="container ">
        <form class="reg-inputs" action="registration.php" method="post">
            <div class='reg-head'>
                <h3>Регистрация</h3>
            </div>
            <div class="form-group">
                <label for="fname">Имя</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Введите ваше имя">
            </div>
            <div class="form-group">
                <label for="lname">Фамилия</label>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Введите вашу фамилию">
            </div>
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Придумайте логин">
            </div>
            <div class="form-group">
                <label for="pass">Пароль</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Придумайте пароль">
            </div>
            <div class="form-group">
                <label for="pass1">Повторите пароль</label>
                <input type="password" class="form-control" name="pass1" id="pass1" placeholder="Повторите пароль">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Введите ваш номер телефона">
            </div>
            <div class="form-group">
                <label for="location">Местоположение</label>
                <input type="text" class="form-control" name="location" id="location" placeholder="Ваше местоположение">
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </main>

    <?php 

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $pass1 = $_POST['pass1'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    // Очистка от Html и php тегов
    function clearing($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    // Проверка длины введенных данных
    function check_length($value, $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    // Проверка на незаполненные поля
    if (
        !empty($fname) && !empty($lname) && !empty($login) && !empty($pass) &&
        !empty($pass1) && !empty($phone) && !empty($location)
    ) {
        if ($pass == $pass1) {
            if (
                check_length($fname, 2, 25) && check_length($lname, 2, 50) &&
                check_length($login, 2, 30) && check_length($phone, 10, 11)
            ) {

                require("connect.php");

                $fnameBD = htmlentities(mysqli_real_escape_string($link, $_POST['fname']));
                $lnameBD = htmlentities(mysqli_real_escape_string($link, $_POST['lname']));
                $loginBD = htmlentities(mysqli_real_escape_string($link, $_POST['login']));
                $passBD = htmlentities(mysqli_real_escape_string($link, $_POST['pass']));
                $phoneBD = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));
                $locationBD = htmlentities(mysqli_real_escape_string($link, $_POST['location']));


                //проверка повторения логина
                $que = "select * from `users` where  login = '$login';";
                $resu = mysqli_query($link, $que);
                if (mysqli_num_rows($resu) > 0) {
                    echo ("<script>alert('Данный логин уже используется');</script>");
                    //проверка повторения логина
                } else {
                    // Внесение данных в БД
                    $query = "Insert into `users` values('$fnameBD','$lnameBD','$loginBD','$passBD','$phoneBD','$locationBD',0)";
                    $result = mysqli_query($link, $query) or die("Error sql" . mysql_error($link));
                    //  $result = $mysqli -> query("Insert into".$db_table."(fname,lname,login,pass,phone,location) values ($fname,$lname,$login,$pass,$phone,$location)");
                    if ($result) {
                        echo ("<script>alert('Вы успешно зарегистровались !');</script>");
                        header('Refresh: 0.3;url = http://localhost:85/Site%20for%20web/signIn.php');
                    }
                    mysqli_close($link);

                    // Внесение данных в БД
                }
            } else {
                echo ("<script>alert('Введена неверная длина одного из полей!');</script>");
            }
        } else {
            echo ("<script>alert('Пароли не совпадают');</script>");
        }
    }
    // else{
    //     echo("<script>alert('Заполните поля');</script>");
    // }
    ?>
    <!-- Footer -->
    <?php
    include("footer.php")
    ?>
    <!-- Footer -->
    <script>
        // Проверка заполненности полей
        function registration() {
            var fn = document.getElementById('fname');
            var ln = document.getElementById('lname');
            var logn = document.getElementById('login');
            var pass = document.getElementById('pass');
            var pass1 = document.getElementById('pass1');
            var ph = document.getElementById('phone');
            var loc = document.getElementById('location');
            if (fn.value == "" || ln.value == "" || logn.value == "" || pass.value == "" || pass1.value == "" ||
                ph.value == "" || loc.value == "") {
                alert("Заполните все поля!");
            }
        }
        // Проверка заполненности полей
    </script>
</body>

</html> 