<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <?php include "views/head.php" ?>
</head>
<body>

<?php 
	session_start();
	include "views/header.php";
	include "config/baseurl.php" ;
	include "config/db.php";

    $user_id = $_SESSION['id'];
?>
    <section class="content">
        <?php include "views/menu.php" ?>
         <div class="profile-content">
            <div class="profile-inner order">

                <?php 
                    if(isset($_GET["menu_id"])){
                        $menu_id = $_GET["menu_id"];
                        if($menu_id == 1){
                            ?>
                                <h1>Заказы</h1>
                                <div class="order-list">
                                    <a href="">Активные</a>
                                    <a href="">Архив</a>
                                    <a href="">Споры</a>
                                    <i class="fa-solid fa-magnifying-glass  fa-search"></i>
                                </div>
                                <div class="order-search">
                                    <div>
                                        <h3>Поиск по заказам</h3>
                                        <p>Вы его ждали, мы его вернули. Можно пользоваться!</p>
                                    </div>
                                    <a>Отлично</a>
                                </div>
                                <span>У вас нет активных заказов</span>
                                <div class="line"></div>            
                            <?php
                        }
                        else if($menu_id == 2){
                            ?>
                                <h1>Избранное</h1>
                                <div class="order-list">
                                    <a href="">Товары</a>
                                    <a href="">Списки желаний</a>
                                </div>
                            <?php
                                $favorite_query = mysqli_query($con, "SELECT * FROM favorites WHERE user_id=".$user_id);
                                if(mysqli_num_rows($favorite_query) > 0){
                                    while($x = mysqli_fetch_assoc($favorite_query)){
                                        $product_id = $x["product_id"];
                                        $fav_product_query = mysqli_query($con, "SELECT * FROM product WHERE id=".$product_id);
                                        $row = mysqli_fetch_assoc($fav_product_query);
                            ?>
                                <div class="favorite-inner">
                                    <div class="favorite-img" style="background-image: url(images/products/<?=$row['product_img']?>);"></div>
                                    <div class="favorite-info">
                                        <h1><?=$row['product_name']?></h1>
                                        <div class="rating">
                                            <p>рейтинг <?=$row['rate']?></p>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="saled"><?=$row['soldout']?> купили</p>
                                        <p><?=$row['description']?></p>
                                        <h3><?=$row['price']?> руб.</h3>
                                        <a class="p-like like-red" href="<?=$BASE_URL?>/api/products/delete_from_fav.php?product_id=<?=$product_id?>"><i class="fa-regular fa-heart"></i></a>
                                    </div>
                                    <div class="f-line"></div>
                                </div>
                            <?php 
                                    }
                                }else{
                            ?>
                                <div class="order-search">
                                    <div>
                                        <h3>Добавьте товары своей мечты</h3>
                                        <p>Так вы их точно не потеряете — они будут в этом списке</p>
                                    </div>
                                    <a href="<?=$BASE_URL?>/index.php">Выбрать товары</a>
                                </div>
                            <?php
                                }
                            ?>

                                

                                

                                <div class="line"></div>
                            <?php
                        }
                        else if($menu_id == 3){
                            ?>
                                <h1>Любимые магазины</h1>
                                <span>Вы пока не подписались ни на один магазин</span>
                                <button class="pokupka">К покупкам</button>
                                <div class="line"></div>
                            <?php
                        }
                        else if($menu_id == 4){
                            ?>
                                <h1>Купоны</h1>
                                <span>Скидки применяются автоматически при оформлении заказа</span>
                                <div class="order-list">
                                    <a href="">Активные</a>
                                    <a href="">Просроченные</a>
                                </div>
                                <span>У вас пока нет купонов</span>
                                <div class="line"></div>
                            <?php
                        }
                        else if($menu_id == 5){
                            ?>
                                <h1>Мои отзывы</h1>
                                <span>У вас еще нет товаров на которые можно оставить отзыв</span>
                                <button class="pokupka">Перейти к покупкам</button>
                                <div class="line"></div>
                            <?php
                        }
                        else if($menu_id == 6){
                            ?>
                                <h1>Мои сообщения</h1>
                                <span>У вас еще нет товаров на которые можно оставить сообщение</span>
                                <button class="pokupka">Перейти к покупкам</button>
                                <div class="line"></div>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <img src="images/avatars/<?=$_SESSION['image_name']?>" alt="">
                            <h1><?=$_SESSION["full_name"]?></h1>
                        <?php
                    }
                ?>                                                          
                <h2>Рекомендуем к покупке</h2>
                <?php include "views/content.php" ?>
            </div>
         </div>
    </section>
    
    <?php include "views/footer.php"; ?>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>