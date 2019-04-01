<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cart</title>
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

if (isset($_GET['action']) && $_GET['action'] == "add") { //zamena
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_s = "select * from product
        where article = {$id}";
        $query_s = mysqli_query($link, $sql_s);
        if (mysql_num_rows($query_s) != 0) {
            $row_s = mysql_fetch_array($query_s);

            $_SESSION['cart'][$row_s['article']] = array(
                "quantity" => 1,
                "price" => $row_s['price']
            );
        } else {

            $message = "This product id it's invalid!";
        }
    }
}
    // if($_COOKIE['userLogin'] == '') {
    //     header('Refresh: 0;url = http://localhost/Libraria/Index.php');
    // }
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signIn.php">Заказы</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="cart.php">Корзина<span class="sr-only">(current)</span></a>
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
                    echo "Здравствуйте, ".$_COOKIE['userLogin'];
                ?>
                </a>  |<a href="Index.php"> Выход</a>
            </div>
            <!-- <div>
                <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Search...">
                    <a href="#" class="search_icon"><i class="glyphicon glyphicon-search"></i></a>
                </div>
            </div> -->
        </div>
    </nav>
    <?

    $ids = array();
    if(isset($_GET['id'])){
        // foreach($_GET as $key => $value){
        //     echo $key .' = '.$value.'<br>';

        // }
        
        array_push($ids,$_GET['id']);   
        setcookie('article',$ids);
    }
    print_r($_COOKIE['article']);

    // $user = 'root';
    // $password = 'root';
    // $db = 'libraria';
    // $host = 'localhost';
    // $port = 3307;
    // $link = mysqli_connect(
    //     "$host:$port",
    //     $user,
    //     $password,
    //     $db
    // );
    
    
    // echo $_POST[test];
    // $action = $_POST["action"];
    // for ($i = 0; $i < count($cart); $i++){
    //     $idProduct = $cart[$i]["article"];
    //     $query = 'select * from product where id = '.$cart[$i]["article"].'';
    //     $results = $mysqli->query($query);
    //     while($row = $results->fetch_assoc()){
    //         echo'
    //         <ul class="cart-header">
    //              <input type="button" value="Убрать" onClick="delFromCart('.$row["article"].')"
    //                  <li class="ring-in"><a href="single.html" ><img src="'.$row["image"].'" class="img-responsive" alt=""></a>
    //                  </li>
    //                  <li><span class="name">'.$row["name"].'</span></li>
    //                  <li><span class="cost">'.$row["price"].' руб.</span></li>
    //                  <li><span>Free</span>
    //                  <p>Delivered in 2-3 business days</p></li>
    //              <div class="clearfix"> </div>
    //          </ul>
    //         ';
                                
    //     }
        
    // }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</body>

</html> 