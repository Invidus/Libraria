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

<body>
    <!-- nAV -->
    <?php
    include("nav.php")
    ?>
    <!-- nAV -->
    <main class="container">
        <form action="registration.php" method="post">
            <label for="fname">Имя</label>
            <input type="text" name="fname" id="fname">

            <label for="lname">Фамилия</label>
            <input type="text" name="lname" id="lname">

            <label for="login">Логин</label>
            <input type="text" name="login" id="login">

            <label for="pass">Пароль</label>
            <input type="text" name="pass" id="pass">

            <label for="pass1">Повторите пароль</label>
            <input type="text" name="pass1" id="pass1">

            <label for="phone">Телефон</label>
            <input type="text" name="phone" id="phone">

            <label for="location">Местоположение</label>
            <textarea id="location" name="location" cols="30" rows="10"></textarea>

            <button type="submit" onClick="registration()">Зарегистроваться</button>
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

                $user = 'root';
                $password = 'root';
                $db = 'libraria';
                $host = 'localhost';
                $port = 3307;
                $db_table = "users";

                $link = mysqli_connect(
                    "$host:$port",
                    $user,
                    $password,
                    $db
                );

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
                    $query = "Insert into `users` values('$fnameBD','$lnameBD','$loginBD','$passBD','$phoneBD','$locationBD')";
                    $result = mysqli_query($link, $query) or die("Error sql" . mysql_error($link));
                    //  $result = $mysqli -> query("Insert into".$db_table."(fname,lname,login,pass,phone,location) values ($fname,$lname,$login,$pass,$phone,$location)");
                    if ($result) {
                        echo ("<script>alert('Вы успешно зарегистровались !');</script>");
                        header('Refresh: 0.3;url = http://localhost/Libraria/signIn.php');
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