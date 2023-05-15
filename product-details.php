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

	$id = $_GET["id"];
	$product_details_query = mysqli_query($con, "SELECT * FROM product WHERE id=$id");
	$product_details = mysqli_fetch_assoc($product_details_query);
?>
    <section class="product-window">
        <div class="product-inner">
            <div class="product-img" style="background-image: url(images/products/<?=$product_details['product_img']?>);"></div>
            <div class="product-info">
                <h1><?=$product_details['product_name']?></h1>
                <div class="rating">
                       <p>рейтинг <?=$product_details['rate']?></p>
                       <i class="fa-solid fa-star"></i>
                </div>
                <p class="saled"><?=$product_details['soldout']?> купили</p>
                <p><?=$product_details['description']?></p>
                <h3><?=$product_details['price']?> руб.</h3>
                <div class="product-button">
                    <a class="kupit" href="">Купить сейчас</a>
                    <?php
                        if(isset($_SESSION['id'])){
                            echo '<a class="korzina" href="'.$BASE_URL.'/api/products/add_to_shop.php?product_id='.$product_details['id'].'">В корзину</a>';
                            echo '<a class="p-like" href="'.$BASE_URL.'/api/products/add_to_favorites.php?product_id='.$product_details['id'].'">
                            <i class="fa-regular fa-heart"></i>
                            </a>';
                        }
                        else{ 
                            echo '<a class="korzina" href="'.$BASE_URL.'/login.php">В корзину</a>';
                            echo '<a class="p-like" href="'.$BASE_URL.'/login.php"><i class="fa-regular fa-heart"></i></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php include "views/footer.php"; ?>

    <script src="modal.js"></script>
    <script src="https://kit.fontawesome.com/76e801a2e4.js" crossorigin="anonymous"></script>
</body>
</html>