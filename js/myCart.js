<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


function addToCart(id) {
    $.post({
        method: "POST",
        url: "/cart.php",
        dataType: "text",
        data: "test = 1",
    }).done(function (msg) {
        alert("Data Saved: " + msg);
    });
}

var fn = document.getElementById('fname');
