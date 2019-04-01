<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin panel</title>
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
    <Header>
        <!-- nAV -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#"></a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="AnamezdIndex.php">Главная<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Заказы</a>
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
                    <a href="#">
                        <?

                        session_start();
                        echo "Здравствуйте, " . $_COOKIE['userLogin'];
                        ?>
                    </a> |<a href="Index.php"> Выход</a>
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
    </Header>
    <div class="container ">
        <form action="adminPanel.php" class="form1" method="post">
            <div class='reg-head'>
                <h3>Внести товар</h3>
            </div>
            <div class="form-group">
                <label for="article">Артикул</label>
                <input type="text" class="form-control" name="article" id="article">
            </div>
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="count">Количество</label>
                <input type="text" class="form-control" name="count" id="count">
            </div>
            <div class="form-group">
                <label for="price">Стоимость</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="img">Изображение</label>
                <input type="text" class="form-control" name="img" id="img" placeholder="включая теги хтмл">
            </div>
            <button type="submit" class="btn btn-primary">Добавить товар</button>
        </form>
        <form action="adminPanel.php" method="post">
            <div class='reg-head'>
                <h3>Внести автора</h3>
            </div>
            <div class="form-group">
                <label for="aname">Имя автора</label>
                <input type="text" class="form-control" name="aname" id="aname">
            </div>
            <div class="form-group">
                <label for="afname">Фамилия автора</label>
                <input type="text" class="form-control" name="afname" id="afname">
            </div>
            <div class="form-group">
                <label for="asname">Отчество автора</label>
                <input type="text" class="form-control" name="asname" id="asname">
            </div>

            <button type="submit" class="btn btn-primary">Добавить автора</button>
        </form>
    </div>
    <?
    $article = $_POST['article'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $count = $_POST['count'];

    $aname = $_POST['aname'];
    $afname = $_POST['afname'];
    $asname = $_POST['asname'];
    // Проверка на незаполненные поля
    if (
        !empty($article) && !empty($name) && !empty($price) && !empty($count)
    ) {
        $user = 'root';
        $password = 'root';
        $db = 'libraria';
        $host = 'localhost';
        $port = 3307;
        $db_table = "product";

        $link = mysqli_connect(
            "$host:$port",
            $user,
            $password,
            $db
        );

        $articleBD = htmlentities(mysqli_real_escape_string($link, $_POST['article']));
        $nameBD = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
        $priceBD = htmlentities(mysqli_real_escape_string($link, $_POST['price']));
        $imgBD = htmlentities(mysqli_real_escape_string($link, $_POST['img']));
        $countBD = htmlentities(mysqli_real_escape_string($link, $_POST['count']));

        //проверка повторения артикула
        $que = "select * from `product` where  article = '$article';";
        $resu = mysqli_query($link, $que);
        if (mysqli_num_rows($resu) > 0) {
            echo ("<script>alert('Данный артикул уже есть в базе');</script>");
            //проверка повторения артикула
        } else {
            // Внесение данных в БД
            $query = "Insert into `product` values('$articleBD','$nameBD','$priceBD','$countBD','$imgBD')";
            $result = mysqli_query($link, $query) or die("Error sql" . mysql_error($link));
            $query1 = "Insert into `author` values('0','$anameBD','$afnameBD','$asnameBD')";
            $result1 = mysqli_query($link, $query1) or die("Error sql" . mysql_error($link));
            $query5 = "SELECT id FROM `author` where fname = '$anameBD'";
            $query2 = "Insert into `author_book` values('0','$articleBD')";
            $result2 = mysqli_query($link, $query2) or die("Error sql" . mysql_error($link));
            // $query = "Insert into `author` values('$anameBD','$afnameBD','$asnameBD')";
            // $result = mysqli_query($link, $query) or die("Error sql" . mysql_error($link));
            if ($result) {
                echo ("<script>alert('Товар успешно внесен !');</script>");
            }
            mysqli_close($link);
            // Внесение данных в БД
        }
    } else {
        if (
            !empty($aname) && !empty($afname) && !empty($asname)
        ) {

            $anameBD = htmlentities(mysqli_real_escape_string($link, $_POST['aname']));
            $afnameBD = htmlentities(mysqli_real_escape_string($link, $_POST['afname']));
            $asnameBD = htmlentities(mysqli_real_escape_string($link, $_POST['asname']));
            // Внесение данных в БД
            $query1 = "Insert into `author` values('0','$anameBD','$afnameBD','$asnameBD')";
            $result1 = mysqli_query($link, $query1) or die("Error sql" . mysql_error($link));
            // $query = "Insert into `author` values('$anameBD','$afnameBD','$asnameBD')";
            // $result = mysqli_query($link, $query) or die("Error sql" . mysql_error($link));
            if ($result) {
                echo ("<script>alert('Автор успешно внесен !');</script>");
            }
            mysqli_close($link);
            // Внесение данных в БД
        }
    }

    function bPrint()
    {
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
        $query = "SELECT * FROM `author` join author_book on
        author.id=author_book.id_a join product on 
        author_book.article_b=product.article";
        $result = mysqli_query($link, $query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $add = $row['article'];
                $name = mb_strimwidth($row['name'], 0, 20, '..', 'utf-8');
                $fname = mb_strimwidth($row['fname'], 0, 1, '', 'utf-8');
                $srname = mb_strimwidth($row['surrname'], 0, 1, '', 'utf-8');

                echo
                    "<div class='images-div'>
            " . $row['image'] . "</br>
            " . $name . "</br>
            " . $row['lname'] . " " . $fname . "." . $srname . "." . "</br>" . $row['price'] . " ₽. </br>
            <form action='cart.php' method='get'>
            <input type='hidden' name='id' value='" . $add . "' />
            <button class='btn btn-primary' name = 'add' type='submit' onclick = 'counter()' >Добавить в корзину</button>
            </form>
            </div>";
            }
        }
    }

    ?>
    <h3 class="container he">Все товары</h3>
    <div class="main-grid container">
        <?
        bPrint();
        ?>
    </div>
</body>

</html> 