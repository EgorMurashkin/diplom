<?require_once("$_SERVER[DOCUMENT_ROOT]/../auth/auth.inc.php");?>
<?php
    $user=$_SESSION["user_info"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/skif.png" />
    <title>Профиль</title>
    <style>
        body {
            background-image: url('/img/fon.jpg');
            background-size: cover;
            }
        .contain {
            box-shadow: 0.0145rem 0.029rem 0.174rem rgba(0, 0, 0, 0.01698),
            0.0335rem 0.067rem 0.402rem rgba(0, 0, 0, 0.024),
            0.0625rem 0.125rem 0.75rem rgba(0, 0, 0, 0.03),
            0.1125rem 0.225rem 1.35rem rgba(0, 0, 0, 0.036),
            0.2085rem 0.417rem 2.502rem rgba(0, 0, 0, 0.04302),
            0.5rem 1rem 6rem rgba(0, 0, 0, 0.06),
            0 0 0 0.0625rem rgba(0, 0, 0, 0.015);
            background: #ffffff;
            border-radius: 0.25rem;
            padding: 40px;
            width: 100%;
            }
        section {
            margin-left: 250px;
            padding: 1rem;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
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
                    <h4>Профиль</h4>
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
            <form action="">
            <button class="btn">Бланки заказов</button><br/><br/>
            </form>
            <form action="">
            <button class="btn">Квитанции</button><br/><br/>
            </form>
            <form action="">
            <button class="btn">Мониторинг работы</button><br/><br/>
            </form>
        </aside>
        <section>
        <div id="mydiv">

            <div class="contain">
                <div id="mydivheader">
                    <h2>Данные пользователя</h2>
                </div>
                <div class="mb-3 mt-3">
                <label for="login">Логин:</label>
                <?=$user["Login"]?>
                </div>
                <div class="mb-3 mt-3">
                <label for="login">Имя:</label>
                <?=$user["Name"]?>
                </div>
                <div class="mb-3 mt-3">
                <label for="login">Фамилия:</label>
                <?=$user["Full_name"]?>
                </div>
                
                
                <form action="/auth/exit.php" style="float: left;">
                    <button class="btn btn-outline-secondary">Выйти</button>
                </form>
                <form action="" style="float: right;">                    
                    <button class="btn btn-outline-secondary">Редактировать</button><br/>
                </form>
                <div style="clear: both;"></div>
            </div>
        </div>
        </section>
    </main>
    <footer class="fixed-bottom">
        <!-- подвал -->
        <p>Copyright ©. All Rights Reserved.</p>
    </footer>
    <script src="/js/DragEl.js"></script>
</body>
</html>