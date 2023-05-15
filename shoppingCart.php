<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <?php include "views/head.php" ?>
</head>
<body>

<?php 
	session_start();
	include "views/header.php";
	include "config/baseurl.php" ;
	include "config/db.php";

    $user_id = $_SESSION['id'];

    $shop_query = mysqli_query($con, "SELECT * FROM shopping WHERE user_id=".$user_id);
?>
    <section class="cart">
        <div class="cart-inner"> 
            <div class="cart-top">
                <h3>Корзина (<?=mysqli_num_rows($shop_query)?>)</h3>
                <div>
                    <input class="checkbox" type="checkbox" id="all">
                    <label for="all">Выбрать все</label>
                </div>
            </div>        
            <div class="cart-content">
                <?php
                if(mysqli_num_rows($shop_query) > 0){
                    while($row = mysqli_fetch_assoc($shop_query)){
                        $shop_product_query = mysqli_query($con, "SELECT * FROM product WHERE id=".$row['product_id']);
                        $shop_item = mysqli_fetch_assoc($shop_product_query);
                ?>
                    <div class="cart-item">
                        <div class="cart-product">
                            <input class="checkbox" type="checkbox" id="tovar">
                            <div class="tovar" for="tovar">
                                <div class="cart-img" style="background-image: url(images/products/<?=$shop_item['product_img']?>);"></div>
                                <div class="cnt-item tv-left">
                                    <p><?=$shop_item['product_name']?></p>
                                    <div class="rating">
                                        <i class="fa-solid fa-star"></i>
                                        <p><?=$shop_item['rate']?></p>
                                        <p class="saled"><?=$shop_item['soldout']?> купили</p>
                                    </div>
                                    <h3><?=$shop_item['price']?> руб.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>  
            <div class="cart-bottom">
                <div>
                    <h5>Способ оплаты</h5>
                    <div class="cart-carts">
                    <img src="images/carts/c1.webp" alt="">
                    <img src="images/carts/c2.webp" alt="">
                    <img src="images/carts/c3.webp" alt="">
                    <img src="images/carts/c4.webp" alt="">
                    <img src="images/carts/c5.webp" alt="">
                    <img src="images/carts/c6.webp" alt="">
                    </div>
                </div>
                <div>
                    <h5>Защита покупателя</h5>
                    <p>Вернём деньги, если заказ не получен или не соответствует описанию.</p>
                </div>
            </div> 
            <div class="cart-recc">
                <?php include "views/content.php"; ?>
            </div>
        </div>
        <div class="cart-result">
            <h2>Сумма заказа</h2>
            <div>Стоимость<h5>0.00 руб.</h5></div>
            <div class="linia"></div>
            <div>К оплате<h3>0.00 руб.</h3></div>
            <button class="cart-button buy">Купить(0)</button>
        </div>
    </section>

    <?php include "views/footer.php"; ?>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>