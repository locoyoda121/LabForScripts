<?php
header ("Content-Type: text/html; charset=utf-8");?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Registration
        </title>
        <link rel="stylesheet" href="style.css"/>
        <script src="jquery-2.2.2.min.js"></script>
        <script>
             function AjaxFormRequest(result_id,form_id,url) {
                jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data: jQuery("#"+form_id).serialize(), 
                    success: function(response) { 
                    document.getElementById(result_id).innerHTML = response;
                },
                error: function(response) { //Если ошибка
                document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
                }
             });
        }
         </script>
    </head>
    <body>
        <div align='right'><a href="index.php" >Authorization</a></div>
        <h1>Registration</h1>
        <div align = "center">
            <div class = "form" >
                <form action="" method="post" id="regForm">
                    <label>Your name</label>&nbsp;&nbsp;<input type="text" name="name" class="data"/><br><br>
                    <label>Login</label>&nbsp;&nbsp;<input type ="text" name="login" class="data"/><br><br>
                    <label>Password</label>&nbsp;&nbsp;<input type="password" name="password" class="data"/><br><br>
                    <label>Repit password</label>&nbsp;&nbsp;<input type="password" name="password2" class="data"/><br><br>
                    <input type="button" value="Save" class = "btn" onclick="AjaxFormRequest('result','regForm','check2.php')"/><br><br>
                </form>
                <div id="result"></div>
            </div>
        </div>
    </body>
</html>