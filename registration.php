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

            <label for="location">Имя</label>
            <textarea id="location" name="location" cols="30" rows="10"></textarea>

            <button type="submit">Зарегистроваться</button>
        </form>

    </main>

    <?php 
    if (
        isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['login']) &&
        isset($_POST['pass']) && isset($_POST['pass1']) && isset($_POST['phone']) &&
        isset($_POST['location'])
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
        
        $fname = htmlentities(mysqli_real_escape_string($link,$_POST['fname']));
        $lname = htmlentities(mysqli_real_escape_string($link,$_POST['lname']));
        $login = htmlentities(mysqli_real_escape_string($link,$_POST['login']));
        $pass = htmlentities(mysqli_real_escape_string($link,$_POST['pass']));
        $phone = htmlentities(mysqli_real_escape_string($link,$_POST['phone']));
        $location = htmlentities(mysqli_real_escape_string($link,$_POST['location']));
        $query = "Insert into users values('$fname','$lname','$login','$pass','$phone','$location')";
        $result = mysqli_query($link,$query) or die ("Error sql" . mysql_error($link));
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