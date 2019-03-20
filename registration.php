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
        if (
            check_length($fname, 2, 25) && check_length($lname, 2, 50) &&
            check_length($login, 2, 30) && check_length($phone, 10, 12)
        ) {



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

            // ВОЗМОЖНО НУЖНО УДАЛИТЬ!!!!!!!---------------------------------
           
            $fnameBD = htmlentities(mysqli_real_escape_string($link, $_POST['fname']));
            $lnameBD = htmlentities(mysqli_real_escape_string($link, $_POST['lname']));
            $loginBD = htmlentities(mysqli_real_escape_string($link, $_POST['login']));
            $passBD = htmlentities(mysqli_real_escape_string($link, $_POST['pass']));
            $phoneBD = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));
            $locationBD = htmlentities(mysqli_real_escape_string($link, $_POST['location']));
            // ВОЗМОЖНО НУЖНО УДАЛИТЬ!!!!!!!---------------------------------
            
            //проверка повторения логина
            $que = "select login from `users` where  login = '$loginBD'";
            $resu = mysqli_query($link, $query);
            $w = mysqli_fetch_all($resu);
            debugger;
            if (!empty($w)) {
                echo ("<script>alert('Данный логин уже используется');</script>");
                //проверка повторения логина
            } else {
                 // Внесение данных в БД
                $query = "Insert into users values('$fnameBD','$lnameBD','$loginBD','$passBD','$phoneBD','$locationBD')";
                $result = mysqli_query($link, $query) or die("Error sql" . mysql_error($link));
                mysqli_close($link);
                echo ("<script>alert('Your successfully registered');</script>");
                 // Внесение данных в БД
            }
        }
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