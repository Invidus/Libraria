<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="css/Calculate.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php 
    include('nav.php');
    ?>
    <div class="container">
    <div class="input-group">
    <label class="select-lvl" for="inputGroupSelect04">Уровень физической нагрузки</label>
  <select  class="custom-select select-lvl" id="inputGroupSelect04"><br>
    <option selected value="1">Сидячий образ жизни</option>
    <option value="2">Легкие физ.нагрузки (1-3 раза в неделю)</option>
    <option value="3">Средние физ.нагрузки (1-5 раз в неделю)</option>
    <option value="4">Интенсивные тренировки (4-5 раз в неделю)</option>
    <option value="5">Ежедневные тренировки </option>
    <option value="6">Тяжелая физическая работа </option>
  </select>
    </div>
    
    








  </div>
    <?php 
    include('footer.php');
    ?>
    
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 
</body>
</html>