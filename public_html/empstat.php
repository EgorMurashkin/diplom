<?php
require_once("$_SERVER[DOCUMENT_ROOT]/../db/databases.php");
require_once("$_SERVER[DOCUMENT_ROOT]/../auth/auth.inc.php");
$user=$_SESSION["user_info"];

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/skif.png" />
    <title>Главная</title>
    <style>
        body {
            background-image: url('/img/fon.jpg');
            background-size: cover;
            }
        .p2 {
            color: #FFC0CB;
            font-size: 12px;
            }
        #mydiv {
            position: absolute;
        }
        #mydivheader {
            cursor: move;
        }
    </style>
    <!-- Подключаем ваш CSS файл -->
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    
</head>
<body>
    <?/*?><xmp><?print_r($_SESSION);?></xmp><?*/?>
    <header>
        <!-- лого/верхнее меню -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                    <img src="icons/skif.png" width="40px" height="40px">
                </div>
                <div class="col-9">
                    <h4>Главная страница</h4>
                </div>
                <div class="col-2">
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
        <h2>История выполнения задач <?=$user["Login"]?></h2><br/>
        <?php             
            $result = mysqli_query($connection,"
            SELECT 
                Job_analysis.ID As ID,
                Job_analysis.ID_User As ID_User,
                Job_analysis.Completed_orders As Completed_orders,
                Job_analysis.Cancelled_orders As Cancelled_orders
            FROM 
                Job_analysis
            WHERE
                Job_analysis.ID_User = ".$_SESSION["user_info"]["ID"]."
        "); 
        ?>

        <table class="table table-bordered table-hover" style="width: 100%">
            <tr>
                <th>Задач выполнено</th>
                <th>Задач отклонено</th>
            </tr>
            <?while ($tk = mysqli_fetch_array($result,MYSQLI_BOTH)):?>
            <tr>
                <td><?=$tk["Completed_orders"]?></td>
                <td><?=$tk["Cancelled_orders"]?></td>
            </tr>
            <?endwhile?>
        </table>
        </section>
    </main>
    <footer class="fixed-bottom">
        <!-- подвал -->
        <p>Copyright ©. All Rights Reserved.</p>
    </footer>
    <script src="/js/DragEl.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>