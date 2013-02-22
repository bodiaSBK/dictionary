<?php

$host="localhost";
$user="root";
$pwd="Ax3Mig";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("dictionary",$db);

mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");


if(isset($_POST['id'])){

    $id = $_POST["id"];
    $word = $_POST["word"];
    $description = $_POST["description"];

    mysql_query("UPDATE words SET word = '$word' AND description = '$description' WHERE id = '$id'") or die("Error #1");

    echo $id . " ";
    echo $word . " ";
    echo $description;
    exit;
}

$result = mysql_query("SELECT * FROM words WHERE word = 'АБАЗА'") or die("Error #1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title>Словарь</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet/less" type="text/css" href="less/bootstrap.less"> <!-- Bootstrap less -->
    <script src="/js/bootstrap-dropdown.js"></script>
    <script src="/js/jquery-1.9.0.js"></script>
    <script src="/js/less-1.3.3.min.js"></script>

    <script src="/update.js"></script>
</head>
<body>
<div class="container">

<p>
    <button class="btn btn-small btn-primary" type="button">Добавить слово</button>
</p>

    <?php
    while ($row = mysql_fetch_assoc($result))   {
     $id = $row["id"];
     $word = $row["word"];
     $description = $row["description"];
print <<<HERE
    <form id='$id'>
        <p class="well">
            <input onchange="send(this);" name="word" style="width: 25%;" type="text" placeholder="Слово" value="$word">
            <textarea onchange="send(this);" name="description" style="width: 100%;height: 150px;" rows="1">$description</textarea>
        </p>
    </form>
HERE;
    }
    ?>






    <p class="well">
        <input style="width: 25%;" type="text" placeholder="Слово" value="">
        <textarea style="width: 71%;" rows="1"></textarea>
    </p>




</div>


</body>
</html>