<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php include "views/head.php" ?>
</head>
<body>
    <?php 
	session_start();
    include "views/header.php";
    include "config/baseurl.php";
    include "config/db.php";
     ?>

    <section class="content">
         <div class="categories">
            <ul>
                <li class="catg">Категории  <i class="fa-solid fa-chevron-right"></i> </li>
                <?php
                    $category_query = mysqli_query($con, "SELECT * FROM categories");
                    while($row = mysqli_fetch_assoc($category_query)){
                        if(isset($_GET["category_id"]) && $row["id"] ==  $_GET["category_id"]){
                            echo '<li class="picked-link"><a href="'. $BASE_URL . '/?category_id=' . $row["id"] .'">'.$row["category_name"].'</a></li>';
                        }
                        else{
                            echo '<li><a href="'. $BASE_URL . '/?category_id=' . $row["id"] .'">'.$row["category_name"].'</a></li>';
                        }
                    }
                ?>
            </ul>
         </div>
         <?php include "views/content.php"; ?>
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
            <button  onclick="registerWindow()" class="new-account">Создать аккаунт</button>
            <a class="help" href="">Нужна помощь?</a>
            <span>Регистрируясь на AliExpress или авторизуясь через социальные сети, вы соглашаетесь с <a>Пользовательским соглашением</a> и <a>Политикой конфиденциальности</a></span>
        </div>
    </div>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>