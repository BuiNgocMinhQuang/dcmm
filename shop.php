<?php
    $active='SHOP';  
    include("includes/header.php");
?>
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li>
                        Shop
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
            <?php
                include("includes/siderbar.php"); /* gọi trang siderbar */
            ?>
            </div>
            <div class="col-md-9">
                
                <div class="row"> <!-- sản phẩm hiện thi -->
                    
                    <?php 

                        if(!isset($_GET['p_cat'])){
                        if(!isset($_GET['cat'])){
                            $per_page=6;

                            if(isset($_GET['page'])){
                                $page = $_GET['page'];

                            }else{
                                    $page=1;
                                }
                                
                                $start_from = ($page-1) *  $per_page;
                                $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                                $run_products = mysqli_query($con,$get_products);
                                while($row_products=mysqli_fetch_array($run_products)){
                                    $product_id = $row_products['product_id'];
        
                                    $product_title = $row_products['product_title'];
        
                                    $product_price = $row_products['product_price'];
        
                                    $product_img1 = $row_products['product_img1'];

                                    echo "
                                        <div class='col-md-4 col-sm-6 center-responsive'>
                                            <div class='product'>
                                                <a href='details.php?pro_id=$product_id'>
                                                    <img class='img-responsive' src='admin_area/product_images/$product_img1'>

                                                    
                                                </a>
                                                <div class='text'>
                                                    <h3>
                                                    <a href='details.php?pro_id=$product_id'>$product_title</a>
                                                    </h3>
                                                    <p class='price'>
                                                        $product_price đ
                                                    </p>
                                                    <p class='button'>
                                                        <a class='btn btn-default' href='details.php?pro_id=$product_id'>
                                                            Xem chi tiết
                                                        </a>
                                                        <a class='btn btn-primary' href='details.php?pro_id=$product_id'>
                                                            <i class='fa fa-shopping-cart'></i>Thêm vào giỏ hàng
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    ";
                                
                            }
                    ?>
                
                </div>
                <center>
                    <ul class="pagination">
                        <?php 
                        $query = "select*from products";

                        $result = mysqli_query($con, $query );

                        $total_records = mysqli_num_rows($result);

                        $total_pages = ceil($total_records / $per_page);
                            echo "
                                <li>
                                    <a href='shop.php?page=1'> ".'Trang đầu'." </a>
                                </li>
                            ";

                            for($i=1;$i<=$total_pages;$i++){
                                echo "
                                <li>
                                    <a href='shop.php?page=".$i."'> ".$i." </a>
                                </li>
                            ";
                            };
                            echo "
                                <li>
                                    <a href='shop.php?page=$total_pages'> ".'Trang cuối'." </a>
                                </li>
                            ";
                            }
                        }  
                        ?>
                    </ul>
                </center> <!-- tạo thanh chuyển trang -->
                
                    <?php 
                        getpcatpro();
                        
                    ?>
                </div>
            </div>


        </div>
    </div>
    <?php
                include("includes/footer.php"); /* gọi trang footer */
            ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    

</body>
</html>