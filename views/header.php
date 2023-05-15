<?php 
	include "config/baseurl.php" ;
	include "config/db.php";
?>
<header>
        <a class="head-left" href="<?=$BASE_URL?>/">
            <img src="images/logo-aliexpress.svg" alt="">
        </a>
        <div class="head-inner">
            <div class="head-middle">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder=".....">
            </div>
            <div class="head-right">
                <!-- <div onclick="modalOpen()"> -->
                <div>
                    <?php
                        if(isset($_SESSION["id"])){
                            $image_name = $_SESSION["image_name"];
                    ?>
                        <a href="<?=$BASE_URL?>/profile.php">
                            <img class="avatar" src="<?=$BASE_URL?>/images/avatars/<?=$image_name?>" alt=""> 
                            Профиль   
                        </a>
                    <?php
                        }
                        else{
                    ?>
                    <a href="<?=$BASE_URL?>/login.php" >
                    <i class="fa-solid fa-user"></i>
                    Войти</a>
                    <?php
                        }
                    ?>
                </div>
                <div>
                    <?php
                        if(isset($_SESSION["id"])){
                            ?>
                                <a href="<?=$BASE_URL?>/profile.php?menu_id=1">
                            <?php
                        }
                        else{
                            ?>
                                <a href="<?=$BASE_URL?>/login.php">
                            <?php
                        }
                    ?>
                        <i class="fa-solid fa-cube"></i>
                        Заказы</a>
                </div>
                <div>
                    <?php
                        if(isset($_SESSION["id"])){
                            ?>
                                <a href="<?=$BASE_URL?>/shoppingCart.php">
                            <?php
                            // header("Location: $BASE_URL/profile.php?menu_id=1");
                        }
                        else{
                            ?>
                                <a href="<?=$BASE_URL?>/login.php">
                            <?php
                        }
                    ?>
                    <i class="fa-solid fa-cart-shopping"></i>
                    Корзина</a>
                </div>
            </div>
        </div>
    </header>