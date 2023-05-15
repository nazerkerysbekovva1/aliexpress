<?php
    include "config/db.php";
    include "config/baseurl.php";
    
?>
<div class="content-inner">
                <?php
                    if(isset($_GET["category_id"])){
                        $category_id = $_GET["category_id"];
                        $product_query = mysqli_query($con, "SELECT * FROM product WHERE category_id=$category_id");
                    }
                    else{
                        $product_query = mysqli_query($con, "SELECT * FROM product");
                    }
                    while($row = mysqli_fetch_assoc($product_query)){  
                ?>
                <div class="cnt-item">
                <?php
                    echo '<a class="cnt-img" href="'.$BASE_URL.'/product-details.php?id='.$row['id'].'" style="background-image: url(images/products/'.$row['product_img'].');"></a>';
                ?>
                    <p><?=$row["product_name"]?></p>
                   <div class="rating">
                       <i class="fa-solid fa-star"></i>
                       <p><?=$row["rate"]?></p>
                       <p class="saled"><?=$row["soldout"]?> купили</p>
                   </div>
                   <h3><?=$row["price"]?> руб.</h3>
                </div>  
                <?php
                    }
                ?>
         <div class="show-more">Показать еще</div>
         </div>