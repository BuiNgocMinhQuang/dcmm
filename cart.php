<?php
    $active='Cart';
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
                        Cart 
                    </li>
                </ul>
            </div>
                <div id="cart" class="col-md-9">
                    <div class="box">
                        <form action="cart.php" method="POST" enctype="multipart/form-data">
                            <h1>Giỏ hàng của bạn</h1>

                            <?php

                                $id_add = getRealIpUser();

                                $select_cart = "select * from cart where id_add='$id_add'";

                                $run_cart = mysqli_query($con,$select_cart);

                                $count = mysqli_num_rows($run_cart);

                            
                            ?>
                            <p class="text-mute">Bạn có <?php echo $count; ?> sản phẩm trong giỏ hàng</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Size</th>
                                            <th colspan="1">Xóa</th>
                                            <th colspan="2">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                            $total = 0;
                                            while($row_cart = mysqli_fetch_array($run_cart)){
                                                
                                                $pro_id = $row_cart['p_id'];

                                                $pro_size = $row_cart['size'];

                                                $pro_qty = $row_cart['qty'];

                                                    $get_products = "select * from products where product_id ='$pro_id'";

                                                    $run_products = mysqli_query($con,$get_products);

                                                    while ($row_products = mysqli_fetch_array($run_products)){

                                                        $product_title = $row_products['product_title'];

                                                        $product_img1 = $row_products['product_img1'];

                                                        $only_price = $row_products['product_price'];

                                                        $sub_total = $row_products['product_price']* $pro_qty;

                                                        $total += $sub_total;


                                                        
                                                    
                                        ?>
                                        <tr>
                                            <td>
                                                <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="product33">
                                            </td>
                                            <td>
                                                <a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
                                            </td>
                                            <td>
                                                <?php echo $pro_qty; ?>
                                            </td>
                                            <td>
                                                <?php echo $only_price; ?> đ
                                            </td>
                                            <td>
                                                <?php echo $pro_size; ?> 
                                            </td>
                                            <td>
                                                <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                            </td>
                                            <td>
                                                <?php echo $sub_total; ?> đ
                                            </td>
                                        </tr>

                                        <?php } } ?>
                                    </tbody>
                                    
                                    
                                </table>
                            </div>
                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="shop.php" class="btn btn-default">
                                            <i class="fa fa-chevron-left"></i> Tiếp tục mua sắm
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                            <i class="fa fa-refresh"></i> Cập nhật giỏ hàng
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <?php 
                
                    function update_cart(){
                        global $con;

                        if(isset($_POST['update'])){

                            foreach($_POST['remove'] as $remove_id){

                                $delete_product = "delete from cart where p_id='$remove_id'";

                                $run_delete = mysqli_query($con,$delete_product);

                                if($run_delete){

                                    echo "<script>window.open('cart.php','_self')</script>";


                                }

                            }

                        }
                    }

                    echo @$up_cart = update_cart();
                
                ?>
                <div class="col-md-3">
                    <div id="order-summary" class="box">
                        <div class="box-header" style="text-align: center;">
                            <h3>Đơn hàng của bạn</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td> Giá trị đơn hàng </td>
                                        <th> <?php echo $total; ?> </th>
                                    </tr>

                                    <tr>
                                   
                                        <td> Phí vận chuyển </td>
                                        <td> 0 đ </td>
                                    </tr>

                                    <tr>
                                        <td> <b>Tổng tiền</b> </td>
                                        <th> <?php echo $total; ?> </th>
                                    </tr>

                                  
                                </tbody>
                                
                            </table>
                            <div style="text-align: center;">
                            <a href="checkout.php" class="btn btn-default">
                                 THANH TOÁN
                            </a>
                            </div>
                        </div>
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