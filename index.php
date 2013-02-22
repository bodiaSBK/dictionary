<?php
$word = $_GET['word'];

$host="localhost";
$user="root";
$pwd="Ax3Mig";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("dictionary",$db);

mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");

if(isset($_GET['word'])){
    $result = mysql_query("SELECT * FROM words WHERE word = '$word'") or die("Error #1");
}
else {
    $result = mysql_query("SELECT * FROM words WHERE word = '$word' LIMIT 0, 1") or die("Error #1");
}
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

    <link href="/Keyboard/css/keyboard.css" rel="stylesheet">
    <script src="/Keyboard/js/jquery.keyboard.js"></script>
    <script src="http://mottie.github.com/Keyboard/layouts/russian.js"></script>
    <script src="/Keyboard/js/jquery.mousewheel.js"></script>

    <script>
        $(document).ready(function() {
            $("#enter").click(function() {
                alert("Hello");
            });
        });

        $(function(){
            $.keyboard.keyaction.enter = function(base){
                    base.accept();      // accept the content
                    $('form').submit(); // submit form on enter
            };
            $.keyboard.keyaction.cancel = function(base){
                base.accept();      // accept the content
                alert("hello");
            };
            var k = $('#keyboard'),
                    s = $('#switcher').find('input'),
                    set = $('#switcher').find('.ui-controlgroup-controls'),
                    kbOptions = {
                        layout       : 'russian-qwerty',
                        keyBinding : 'mousedown touchstart',
                        alwaysOpen : true,
                        position     : {
                            of : 'center bottom', // optional - null (attach to input/textarea) or a jQuery object (attach elsewhere)
                            my : 'center bottom',
                            at : 'center bottom',
                            at2: 'center bottom' // used when "usePreview" is false (centers keyboard at bottom of the input/textarea)
                        },
                        display : {
                            'e'      : '\u21b5:Enter',        // down, then left arrow - enter symbol
                            'enter'  : 'Поиск:Поиск',
                        },
                        usePreview   : false,
                        // make sure jQuery UI styles aren't applied even if the stylesheet has loaded
                        // the Mobile UI theme will still over-ride the jQuery UI theme
                        css : {
                            input          : '',
                            container      : '',
                            buttonDefault  : '',
                            buttonHover    : '',
                            buttonActive   : '',
                            buttonDisabled : ''
                        },
                    };

            k
                    .keyboard(kbOptions)
        });
    </script>
</head>
<body>

<div class="container">


<?php
            while ($row = mysql_fetch_assoc($result))   {
print <<<HERE
    <div class="row"><p class="well">
HERE;
                echo "<b>" . $row["word"] . "</b>";
                echo $row["description"];
print <<<HERE
    </p></div>
HERE;
                                                        }
?>
    <form action="/index.php">
        <input id="keyboard" name="word" type="text" style="width:900px">
    </form>

</div>

</body>
</html>


