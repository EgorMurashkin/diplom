<?php
require_once("$_SERVER[DOCUMENT_ROOT]/../db/databases.php");

error_reporting(~E_WARNING);

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
    <header>
        <!-- лого/верхнее меню -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                    <img src="icons/skif.png" width="40px" height="40px">
                </div>
                <div class="col-9">
                    <h4>Клиенты</h4>
                </div>
                <div class="col-2">
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