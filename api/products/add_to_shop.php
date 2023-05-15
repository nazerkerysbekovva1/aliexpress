<?php

    session_start();
	include "../../config/db.php";
	include "../../config/baseurl.php";

    $product_id = $_GET["product_id"];
    $user_id = $_SESSION["id"];

            mysqli_query($con, "INSERT INTO shopping(product_id, user_id) 
                                    VALUES($product_id, $user_id)");
            header("Location: $BASE_URL/shoppingCart.php?id=$product_id"); 
    
?>