<!DOCTYPE html lang="ru">
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Libraria</title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/HeaderRec.css" />
    <link rel="stylesheet" type="text/css" href="./css/Header.css" />
    <link rel="stylesheet" href="./css/font-glyphicons.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet' type='text/css'>
</head>

<body>
    <?
    setcookie("userLogin", '');
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
    $query = "select * from `product`";
    $result = mysqli_query($link, $query);
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $articlesArray = array(
                $row[0],
            );
            // $nameArray = array(
            //     $row[1],
            // );
            // $priceArray = array(
            //     $row[2],
            // );
            // $countArray = array(
            //     $row[3],
            // );
            // $imgArray = array(
            //     $row[4],
            // );           
        }
    }
    mysqli_free_result($result);

    echo $articlesArray[1];
    ?>
    <!-- Navbar & Header -->
    <Header>
        <?php
        include("nav.php");
        ?>
        <?php
        include("header-text.php")
        ?>
    </Header>
    <!-- Navbar & Header -->


    <!-- Main -->
    <main class="container">
        <article class="main-grid">
            <?
            $k = count($articlesArray);
            echo $k;
            while ($k != 0) {
                echo "<div>";
                echo "<img class='main-images' src='".$imgArray[$k]."' alt='book-logo'>";
                echo "<p>".$nameArray[$k]."   ".$priceArray[$k]."</p>";
                echo "</div>";
                $k--;
            }


            ?>
            <div class="main-images">
                <img src="" alt="book-logo">
            </div>
            <div class="main-images">
                <img src="" alt="book-logo">
            </div>
        </article>
    </main>
    <!-- Main -->

    <!-- Footer -->
    <?php
    include("footer.php")
    ?>
    <!-- Footer -->

    <script src="./js/Script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html> 