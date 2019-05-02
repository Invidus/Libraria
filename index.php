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
    <link rel="stylesheet" type="text/css" href="./css/Header.css" />
    <link rel="stylesheet" href="./css/font-glyphicons.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet' type='text/css'>
</head>

<body>
    <?
    session_start();
    setcookie("userLogin", '');
    setcookie("article", '');
    $arr = array();
    // Вывод товаров на экран
    function bookPrint()
    {

        require("outputItems.php");
        require("CartC.php");
        # Добавление ID товара в корзину
        $id = $_POST['article'];
        $cart = new Cart;
        $cart->set($id);

        $cart->save();

        $ids = $cart->get();
        print_r($ids);
        // $i = 0;
        
        // if(isset($_POST['add'])){
        //     setcookie('Article',$_POST['article']);
        //     print_r($_COOKIE['Article']);

        // setcookie('Article[]',null);
        // print_r( $_COOKIE );
        // print_r( $_COOKIE );
        // $o = $_POST['article']; 

        // array_push($arr,$o);
        // setcookie('Article',json_encode($_POST['article']));
        // echo $arr[0];
    }
    
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
    <div class="hr-header">
        <a href="#scrolla">
            <img class="hr-header-img" src="./Images/down-arrows_icon-icons.com_70186.png" alt="scrollDown">
        </a>
    </div>

    <!-- Main -->
    <main class="container" id='scrolla'>
        <article class="main-grid">
            <?
            bookPrint();
            ?>
        </article>
    </main>
    <!-- Main -->

    <!-- Footer -->
    <?php
    include("footer.php")
    ?>
    <!-- Footer -->

    <script src="./js/myCart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        var k = 0;
        $(document).ready(function() {
            $("a[href*=#]").on("click", function(e) {
                var anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(anchor.attr('href')).offset().top
                }, 777);
                e.preventDefault();
                return false;
            });
        });
    </script>
</body>

</html>