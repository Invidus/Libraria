<?
require("connect.php");
$query = "SELECT * FROM `author` join author_book on
author.id=author_book.id_a join product on 
author_book.article_b=product.article";
$result = mysqli_query($link, $query);
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        $article = $row['article'];
        $price = $row['price'];
        $nameBook = $row['name'];
        $name = mb_strimwidth($row['name'], 0, 20, '..', 'utf-8');
        $fname = mb_strimwidth($row['fname'], 0, 1, '', 'utf-8');
        $srname = mb_strimwidth($row['surrname'], 0, 1, '', 'utf-8');

        echo
            "<div class='images-div'>
            <img class='main-images' src='" . $row['image'] . "' alt='book-logo'></br>
    " . $name . "</br>
    " . $row['lname'] . " " . $fname . "." . $srname . "." . "</br>" . $row['price'] . " ₽. </br>
    <form id = 'form1' name = 'form1'  method='post'>
    <input type='hidden' name='article' value='" . $article . "' />
    <input type='hidden' name='price' value='" . $price . "' />
    <input type='hidden' name='nameBook' value='" . $nameBook . "' />
    <input type='hidden' name='authorName' value='" .  $row['lname'] . " " . $fname . "." . $srname . "' />
    <button class='btn btn-primary' name = 'add' >Добавить в корзину</button>
    </form>
    </div>";
    }
}
?>