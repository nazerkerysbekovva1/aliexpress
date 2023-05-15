<?php
    include "../../config/baseurl.php";
    include "../../config/db.php";
    
    $product_id = $_GET["product_id"];
    mysqli_query($con, "DELETE FROM favorites WHERE product_id = $product_id");
    header("Location: $BASE_URL/profile.php?menu_id=2");
?>