<?php

    session_start();
	include "../../config/db.php";
	include "../../config/baseurl.php";

    $product_id = $_GET["product_id"];
    $user_id = $_SESSION["id"];

    $favorites = mysqli_query($con, "SELECT product_id FROM favorites WHERE product_id=".$product_id);
    // $row = mysqli_fetch_assoc($favorites)
        if(mysqli_num_rows($favorites) == 0){
            mysqli_query($con, "INSERT INTO favorites(product_id, user_id) 
                                    VALUES($product_id, $user_id)");
            header("Location: $BASE_URL/product-details.php?id=$product_id"); 
        }
        else{
            header("Location: $BASE_URL/product-details.php?id=$product_id&error=1");
            // exit(); 
        }
    
?>