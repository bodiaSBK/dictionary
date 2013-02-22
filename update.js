$(document).ready(function(){

});

function send(that)
{
    var id = $(that).parent().parent().attr("id");
    var word = $(that).parent().children('input[name=word]').val();
    var description = $(that).parent().children('textarea[name=description]').val();
    // Отсылаем паметры
    $.ajax({
        type: "POST",
        url: "admin.php",
        data: {'id': id, 'word': word, 'description': description},
        // Выводим то что вернул PHP
        success: function(html) {
            //предварительно очищаем нужный элемент страницы
            $("#result").empty();
//и выводим ответ php скрипта
            $("#result").append(html);
        }
    });

}