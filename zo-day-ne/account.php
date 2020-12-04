<?php
    $active='MY ACCOUNT';
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
                        Register
                    </li>
                </ul>
            </div>
            
             <!-- form  đăng kí -->
            <div class="col-md-12">
               <div class="box">
                   <div class="box-header">
                       <center>
                           <h2>Đăng kí tài khoản</h2>
                           <p class="text-muted">
                               Tạo tài khoản để nhận thêm nhiều ưu đãi
                           </p>
                       </center>
                       <form action="account.php" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                               <label>Họ và tên</label>
                               <input type="text" class="form-control" name="hovaten" required>
                           </div>
                           <div class="form-group">
                               <label>Email</label>
                               <input type="text" class="form-control" name="email" required>
                           </div>
                           <div class="form-group">
                               <label>Mật khẩu</label>
                               <input type="password" class="form-control" name="matkhau" required>
                           </div>
                           <div class="form-group">
                               <label>Điện thoại</label>
                               <input type="number" class="form-control" name="sodienthoai" required>
                           </div>
                           <div class="form-group">
                               <label>Địa chỉ</label>
                               <textarea name="diachi" class="form-control"></textarea>
                           </div>
                           <div class="form-group">
                               <label>Ảnh đại diện</label>
                               <input type="file" class="form-control form-height-custom" name="anhdaidien" required>
                           </div>
                           <div class="text-center">
                               <button type="submit" name="dangki" class="btn btn-primary">
                               <i class="fa fa-check"></i> Đăng kí 
                               </button>
                               
                                 <h4> hoặc</h4>
                              
                           </div>
                       </form>
                       <center>
                            <a href="checkout.php">
                            <button type="submit" name="dangnhap" class="btn btn-primary">
                            <i class="fa fa-check"></i> Đăng nhập
                            </button>
                            </a>
                        </center>
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

<?php
// Tải file mysql.php lên


if (isset($_POST['dangki']))
{


$c_name = ( $_POST['hovaten'] );
$c_pass = ( $_POST['matkhau'] );
$c_email =( $_POST['email']);
$c_phone = ($_POST['sodienthoai']); 
$c_address = ($_POST['diachi']);
$c_image = $_FILES['anhdaidien']['name'];
$c_image_tmp = $_FILES['anhdaidien']['tmp_name'];
$c_ip = getRealIpUser();


move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_phone,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_phone','$c_address','$c_image','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from cart where id_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>=0){
        
        /// Đăng kí khi có sản phảm trong giỏ hàng  ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('Đăng kí thành công')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }else{
        
        /// Đăng kí khi 0 có sản phảm trong giỏ hàng  ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('Đăng kí thành công')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

?>