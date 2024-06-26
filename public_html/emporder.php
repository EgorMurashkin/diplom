<?php
require_once("$_SERVER[DOCUMENT_ROOT]/../db/databases.php");
require_once("$_SERVER[DOCUMENT_ROOT]/../auth/auth.inc.php");
$user=$_SESSION["user_info"];

session_start();
error_reporting(~E_WARNING);

if(isset($_POST["btn_go"])) {
    //Защита от SQL-инъекций
    $F_name=mysqli_real_escape_string($connection,$_POST["F_name"]);
    $S_name=mysqli_real_escape_string($connection,$_POST["S_name"]);
    $Com=mysqli_real_escape_string($connection,$_POST["Com"]);
    $mail=mysqli_real_escape_string($connection,$_POST["mail"]);
    $Num=mysqli_real_escape_string($connection,$_POST["Num"]);
    $inn=mysqli_real_escape_string($connection,$_POST["inn"]);
    $adress=mysqli_real_escape_string($connection,$_POST["adress"]);


    if(isset($_POST["f_ID"])) {
        $id=(int)$_POST["f_ID"];
        mysqli_query($connection,"
            UPDATE `Clients`
            SET
                Name='$F_name',
                Full_name='$S_name',
                Company='$Com',
                Mail='$mail',
                Number='$Num',
                Inn='$inn',
                Company_adress='$adress'
            WHERE
                ID=$id
        "); 
    }        
    else
        mysqli_query($connection,"
            INSERT INTO `Clients`(Role,Name,Full_name,Company,Mail,Number,Inn,Company_adress) 
            VALUES(2,'$F_name','$S_name','$Com','$mail','$Num','$inn','$adress')
        ");

    //Сброс значений формы после успешной её обработки
    header("Location: $_SERVER[PHP_SELF]");

}

$form_fields=$_POST;

if(isset($_GET["edit_id"])) {
    $id=(int)$_GET["edit_id"];

    $res=mysqli_query($connection,"SELECT * FROM `Сlients` WHERE ID=$id");

    $client=mysqli_fetch_array($res,MYSQLI_BOTH);

    $form_fields["f_ID"]=$client["ID"];
    $form_fields["F_name"] = $client["Name"];
    $form_fields["S_name"] = $client["Full_name"];
    $form_fields["Com"] = $client["Company"];
    $form_fields["mail"] = $client["Mail"];
    $form_fields["Num"] = $client["Number"];
    $form_fields["inn"] = $client["Inn"];
    $form_fields["adress"] = $client["Company_adress"];
}

if(isset($_GET["confirm_delete_id"])) {
    $id=(int)$_GET["confirm_delete_id"];

    $res=mysqli_query($connection,"DELETE FROM `Сlients` WHERE ID=$id");

     //Сброс значений формы после успешной её обработки
     header("Location: $_SERVER[PHP_SELF]");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/skif.png" />
    <title>Клиенты</title>
    <style>
        body {
            background-image: url('/img/fon.jpg');
            background-size: cover;
            }
    </style>
    <!-- Подключаем ваш CSS файл -->
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    
</head>
<body>
<header class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- лого/верхнее меню -->
        <div class="container-fluid">
            <div class="row" style="width: 100%;">
                <div class="col-1">
                    <img src="icons/skif.png" width="40px" height="40px">
                </div>
                <div class="col-10">
                    <h4>Бланки заказов</h4>
                </div>
                <div class="col-1">
                    <form action="/empprofile.php">
                        <button class="btn btn-outline-light text-light">Профиль</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main>
    <aside>
            <!-- боковое меню -->
            <form action="/empmain.php">
            <button class="btn">Предстоящие задачи</button><br/><br/>
            </form>
            <form action="/empclient.php">
            <button class="btn">Клиенты</button><br/><br/>
            </form>
            <form action="/empgoods.php">
            <button class="btn">Товары</button><br/><br/>
            </form>
            <form action="/emporder.php">
            <button class="btn">Бланки заказов</button><br/><br/>
            </form>
            <form action="/empstat.php">
            <button class="btn">Мониторинг работы</button><br/><br/>
            </form>
        </aside>
        <section>
        <!-- Button to Open the Modal -->
        <form action="/neworder.php">
            <button class="btn">Создать бланк заказа</button>
            </button><br/><br/>
        </form>
        <h3>Оформленные бланки заказов сотрудником: <?=$user["Login"]?></h3><br/>
        <?php  $result = mysqli_query($connection,"SELECT * FROM Order_form"); ?>

        <table class="table table-bordered table-hover" style="width:100%">
            <tr>
                <th>Номер заказа</th>      
                <th>Компания</th>
            </tr>
            <?while ($tov = mysqli_fetch_array($result,MYSQLI_BOTH)):?>
            <tr>
                <td><?=$tov["ID"]?></td>
                <td><?=$tov["Company"]?></td>
            </tr>
            <?endwhile?>
        </table>
        </section>
    </main>
    <footer class="fixed-bottom">
        <!-- подвал -->
        <p>Copyright ©. All Rights Reserved.</p>
    </footer>
    <script src="/js/scripts.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <?if(isset($_GET["edit_id"])):?>
        <script>
        //открытие диалогового окна формы
        let myModal = new bootstrap.Modal(document.getElementById('myModal'), {});
        myModal.show();    
        </script>
    <?endif;?>
    <?if(isset($_GET["delete_id"])):?>
        <script>
        //открытие диалогового окна формы
        let myModal = new bootstrap.Modal(document.getElementById('myModalDelete'), {});
        myModal.show();    
        </script>
    <?endif;?>
</body>
</html>