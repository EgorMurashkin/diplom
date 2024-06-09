<?require_once("$_SERVER[DOCUMENT_ROOT]/../auth/auth.inc.php");
require_once("$_SERVER[DOCUMENT_ROOT]/../db/databases.php");

    $user=$_SESSION["user_info"];

    error_reporting(~E_WARNING);

    if(isset($_POST["btn_go"])) {
        //Защита от SQL-инъекций
        $F_name=mysqli_real_escape_string($connection,$_POST["F_name"]);
        $S_name=mysqli_real_escape_string($connection,$_POST["S_name"]);
        $Num=mysqli_real_escape_string($connection,$_POST["Num"]);
        $mail=mysqli_real_escape_string($connection,$_POST["mail"]);
        $Pass=mysqli_real_escape_string($connection,$_POST["Pass"]);
        $inn=mysqli_real_escape_string($connection,$_POST["inn"]);
        $log=mysqli_real_escape_string($connection,$_POST["log"]);
        $pass2=md5($_POST["pass2"]);
    
    
        if(isset($_POST["f_ID"])) {
            $id=(int)$_POST["f_ID"];
    
            $upd_pass=(trim($_POST["pass2"])=="")?"":",Password='$pass2'";
        
            //die($upd_pass);
    
            mysqli_query($connection,"
                UPDATE users
                SET
                    Name='$F_name',
                    Full_name='$S_name',
                    Number='$Num',
                    Mail='$mail',
                    Passport_data='$Pass',
                    Inn='$inn',
                    Login='$log' $upd_pass
                WHERE
                    ID=$id
            "); 
        }        
        else 
            mysqli_query($connection,"
                INSERT INTO users(Role,Name,Full_name,Number,Mail,Passport_data,Inn,Login,Password) 
                VALUES(2,'$F_name','$S_name','$Num','$mail','$Pass','$inn','$log','$pass2')
            ");
    
        //Сброс значений формы после успешной её обработки
        header("Location: $_SERVER[PHP_SELF]");
    
    }

    $form_fields=$_POST;

if(isset($_GET["edit_id"])) {
    $id=(int)$_GET["edit_id"];

    $res=mysqli_query($connection,"SELECT * FROM users WHERE ID=$id");

    $emp=mysqli_fetch_array($res,MYSQLI_BOTH);

    $form_fields["f_ID"]=$emp["ID"];
    $form_fields["F_name"] = $emp["Name"];
    $form_fields["S_name"] = $emp["Full_name"];
    $form_fields["Num"] = $emp["Number"];
    $form_fields["mail"] = $emp["Mail"];
    $form_fields["Pass"] = $emp["Passport_data"];
    $form_fields["inn"] = $emp["Inn"];
    $form_fields["log"] = $emp["Login"];
    //$form_fields["pass2"] = $emp["Password"];
}

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
<header class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- лого/верхнее меню -->
        <div class="container-fluid">
            <div class="row" style="width: 100%;">
                <div class="col-1">
                    <img src="icons/skif.png" width="40px" height="40px">
                </div>
                <div class="col-10">
                    <h4>Профиль</h4>
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
        
                <!-- The Modal -->
                <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="na" class="form-label">Имя:</label>
                        <input name="F_name" type="text" class="form-control" id="na" placeholder="Имя" name="fe" value="<?=$form_fields["F_name"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Фамилия:</label>
                        <input name="S_name" type="text" class="form-control" id="pwd" placeholder="Фамилия" name="erw" value="<?=$form_fields["S_name"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="qua" class="form-label">Номер:</label>
                        <input name="Num" type="text" class="form-control" id="qua" placeholder="Номер" name="cg" value="<?=$form_fields["Num"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="wei" class="form-label">Почта:</label>
                        <input name="mail" type="text" class="form-control" id="wei" placeholder="Почта" name="eweg" value="<?=$form_fields["mail"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="pr" class="form-label">Паспортные данные:</label>
                        <input name="Pass" type="text" class="form-control" id="pr" placeholder="Пасспортные данные" name="htce" value="<?=$form_fields["Pass"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="prup" class="form-label">ИНН:</label>
                        <input name="inn" type="text" class="form-control" id="prup" placeholder="ИНН" name="xfe" value="<?=$form_fields["inn"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="lo" class="form-label">Логин:</label>
                        <input name="log" type="text" class="form-control" id="lo" placeholder="Логин" name="yu" value="<?=$form_fields["log"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="pa" class="form-label">Пароль:</label>
                        <a href="javascript:void(0)" onclick="show_password_box()">Изменить</a>
                        <input style="display:none;" name="pass2" type="text" class="form-control" id="pa" placeholder="Пароль" name="iu" value="<?=$form_fields["pass2"]?>">
                    </div>
                    <?if(isset($form_fields["f_ID"])):?>
                        <input name="f_ID" type="hidden" value="<?=$form_fields["f_ID"]?>"/>
                    <?endif;?>

                    <button name="btn_go" type="submit" class="btn btn-light">Сохранить</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Отмена</button>
            </div>

            </div>
        </div>
        </div>

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
                <div class="mb-3 mt-3">
                <label for="login">Номер:</label>
                <?=$user["Number"]?>
                </div>
                <div class="mb-3 mt-3">
                <label for="login">Почта:</label>
                <?=$user["Mail"]?>
                </div>
                <div class="mb-3 mt-3">
                <label for="login">Паспортные данные:</label>
                <?=$user["Passport_data"]?>
                </div>
                <div class="mb-3 mt-3">
                <label for="login">ИНН:</label>
                <?=$user["Inn"]?>
                </div>
                
                
                <form action="/auth/exit.php" style="float: left;">
                    <button class="btn btn-outline-secondary">Выйти</button>
                </form>
                <form action="" style="float: right;">                    
                <a href="employees.php?edit_id=<?=$user["ID"]?>" class="btn btn-light">Редактировать</a>
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