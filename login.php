<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php include "views/head.php" ?>
</head>
<body>
    <?php include "views/header.php"; ?>
    <?php include "config/baseurl.php"; ?> 

    <section class="register"> 
        
    <?php include "views/content.php" ; ?>

        <div class="register-window">
            <form class="reg-content login-content" action="api/auth/signin.php" method="POST">
                <h1>Войдите в аккаунт</h1>
                <div class="reg-input">
                    <input type="text" name="email" placeholder="Почта или телефон">
                </div>
                <div class="reg-input">
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
                
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == 1){
                    echo  '<p class="text-danger">Заполните все поля</p>';
                }
                else if($_GET["error"] == 2 || $_GET["error"] == 3){
                    echo    '<p class="text-danger">Email или пароль неверный!</p>';
                }
            }
            ?>
            
                <button class="registr">Войти</button>
                <div class="linia"></div>
                <a href="<?=$BASE_URL?>/register.php"  class="new-account">Создать аккаунт</a>
                <a href="" class="help">Нужна помощь?</a>
                <span>Регистрируясь на AliExpress или авторизуясь через социальные сети, вы соглашаетесь с <a>Пользовательским соглашением</a> и <a>Политикой конфиденциальности</a></span>
            </form>
        </div>
    </section>
    
    <?php include "views/footer.php"; ?>

    <div class="modal-window">
        <div class="modal-content">
            <div class="xmark">
                <i class="fa-solid fa-xmark" onclick="modalClose()"></i>
            </div>
            <h1>Войдите в аккаунт</h1>
            <div class="login-input">
                <input type="text" placeholder="Почта или телефон">
            </div>
            <button class="next">Продолжить</button>
            <div class="linia"></div>
            <button class="new-account">Создать аккаунт</button>
            <a href="">Нужна помощь?</a>
            <span>Регистрируясь на AliExpress или авторизуясь через социальные сети, вы соглашаетесь с <a>Пользовательским соглашением</a> и <a>Политикой конфиденциальности</a></span>
        </div>
    </div>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>