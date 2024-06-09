<?php
require_once("$_SERVER[DOCUMENT_ROOT]/../db/databases.php");

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
    <header class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- лого/верхнее меню -->
        <div class="container-fluid">
            <div class="row" style="width: 100%;">
                <div class="col-1">
                    <img src="icons/skif.png" width="40px" height="40px">
                </div>
                <div class="col-10">
                    <h4>Анализ работы сотрудников</h4>
                </div>
                <div class="col-1">
                    <form action="/profile.php">
                        <button class="btn btn-outline-light text-light">Профиль</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main>
    <aside>
            <!-- боковое меню -->
            <form action="/main.php">
            <button class="btn">Главная страница</button><br/><br/>
            </form>
            <form action="/goods.php">
            <button class="btn">Товары</button><br/><br/>
            </form>
            <form action="/client.php">
            <button class="btn">Клиенты</button><br/><br/>
            </form>
            <form action="/employees.php">
            <button class="btn">Сотрудники</button><br/><br/>
            </form>
            <form action="/tasks.php">
            <button class="btn">Задачи</button><br/><br/>
            </form>
            <form action="/stat.php">
            <button class="btn">Анализ работы</button><br/><br/>
            </form>
            <form action="/orders.php">
            <button class="btn">Накладные</button><br/><br/>
            </form>
        </aside>
        <section>
        <!-- Button to Open the Modal -->

        <?php             
            $result = mysqli_query($connection,"
                SELECT 
                    Job_analysis.ID As ID,
                    users.Login As ID_user,
                    Job_analysis.Completed_orders As Completed_orders,
                    Job_analysis.Cancelled_orders As Cancelled_orders
                FROM 
                    Job_analysis,users
                WHERE
                    Job_analysis.ID_user = users.ID
                ORDER BY
                 `Job_analysis`.`Completed_orders` DESC
            ");  
        ?>

        <table class="table table-bordered table-hover" style="width: 100%">
            <tr>
                <th>ID</th>      
                <th>Сотрудник</th>
                <th>Задач выполнено</th>
                <th>Задач отклонено</th>
            </tr>
            <?while ($tk = mysqli_fetch_array($result,MYSQLI_BOTH)):?>
            <tr>
                <td><?=$tk["ID"]?></td>
                <td><?=$tk["ID_user"]?></td>
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