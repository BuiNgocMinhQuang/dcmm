<?php 

session_start();
if(!isset($_SESSION['customer_email'])){

    echo "<script>window.open('../checkout.php','_self')</script>";


}else{
include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['order_id'])){

    $order_id = $_GET['order_id'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>5theway</title> <!-- tiêu đề trang web -->
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               
               </a>

                 
               <?php 
                           
                    if(!isset($_SESSION['customer_email'])){
                       
                    echo "<a href='checkout.php'> Đăng nhập </a>";

                    }else{

                        echo " <a href='logout.php'> Đăng xuất </a> ";

                    }
                           
                ?>
               
               
           </div><!-- col-md-6 offer Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
           <a href="../index.php" class="navbar-brand home"><!--  mở navbar-brand home  -->
                   
                   <h1><b>5Theway</b></h1>
                   
                </a><!-- đóng navbar-brand home  -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="../shop.php">SHOP</a>
                       </li>
                       <li>
                           <a href="../collections.php">COLLECTIONS</a>
                       </li>
                       <li >
                           <a href="sale.php">SALE</a>
                       </li>
                       <li class="active">
                           <a href="../my_account.php">MY ACCOUNT</a>
                       </li>
                       <li>
                           <a href="../aboutus.php">ABOUT US</a>
                       </li>
                       <li>
                           <a href="../contact.php">CONTACT</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <div class="navbar-collapse collapse right"> <!-- mở navbar-collapse collapse right -->
                    <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- mở btn navbar-btn btn-primary -->
                        <i class="fa fa-shopping-cart"></i>
                        
                    </a><!-- đóng btn navbar-btn btn-primary --> 
                    <!-- nút giỏ hàng -->
                </div> <!-- đóng navbar-collapse collapse right -->
               <div class="navbar-collapse collapse right"> <!-- mở navbar-collapse collapse right -->
                    <a href="../account.php" class="btn navbar-btn btn-primary right"><!-- mở btn navbar-btn btn-primary -->
                        <i class="fa fa-user"></i>
                    </a> <!-- đóng btn navbar-btn btn-primary --> 
                   <!-- nút đăng nhập tài khoản -->
                </div> <!-- đóng navbar-collapse collapse right -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
       
    </div><!-- đóng navbar navbar-default --> 
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home </a>
                    </li>
                    <li>
                        My Account
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
            <?php
                include("includes/siderbar.php"); /* gọi trang siderbar */
            ?>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h1 align="center">Điền vào đơn bên dưới</h1>
                    <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Invoice No :</label>
                            <input type="text" class="form-control" name="invoice_no" require>

                            </input>
                        </div>
                        <div class="form-group">
                            <label>Amount Sent :</label>
                            <input type="text" class="form-control" name="amount_sent" require>
                            
                            </input>
                        </div>
                        <div class="form-group">
                            <label>Select Payment Mode :</label>
                            <select  name="payment_mode" class="form-control"  >
                                <option> Select Payment Mode </option>
                                <option> Back Code </option>
                                <option> Paypall </option>
                                <option> Payoneer </option>
                                <option> Western Union </option>
                            </select>
                        </div>
                        
                       <div class="form-group"><!-- form-group Begin -->
                           
                           <label> Transaction / Reference ID: </label>
                            
                            <input type="text" class="form-control" name="ref_no" required>
                             
                         </div><!-- form-group Finish -->
                         
                         <div class="form-group"><!-- form-group Begin -->
                             
                           <label> Paypall / Payoneer / Western Union Code: </label>
                            
                            <input type="text" class="form-control" name="code" required>
                             
                         </div><!-- form-group Finish -->
                         
                         <div class="form-group"><!-- form-group Begin -->
                             
                           <label> Payment Date: </label>
                            
                            <input type="text" class="form-control" name="date" required>
                             
                         </div><!-- form-group Finish -->
                         
                         <div class="text-center"><!-- text-center Begin -->
                             
                             <button class="btn btn-primary btn-lg " name="confim_payment"><!-- tn btn-primary btn-lg Begin -->
                                 
                                 <i class="fa fa-user-md"></i> Xác nhận thanh toán 
                                 
                             </button><!-- tn btn-primary btn-lg Finish -->
                             
                         </div><!-- text-center Finish -->
                    </form>

                    <?php
                    
                        if(isset($_POST['confim_payment'])){

                            $update_id = $_GET['update_id'];

                            $invoice_no = $_POST['invoice_no'];

                            $amount = $_POST['amount_sent'];

                            $payment_mode = $_POST['payment_mode'];

                            $ref_no = $_POST['ref_no'];

                            $code = $_POST['code'];

                            $payment_date = $_POST['date'];

                            $complete = "Hoàn thành";

                            $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) 
                            
                            values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                            $run_payment = mysqli_query($con,$insert_payment);

                            $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                            $run_customer_order = mysqli_query($con,$update_customer_order);

                            $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                            $run_pending_order = mysqli_query($con,$update_pending_order);

                            if($run_pending_order){

                                echo "<script>alert('Cảm ơn bạn đã mua hàng, đơn hàng của bạn sẽ được hoàn thành trong vòng 24 tiếng')</script>";

                                echo "<script>window.open('my_account.php?my_orders','_self')</script>";

                            }
                        }
                    
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php
                include("includes/footer.php"); /* gọi trang footer */
            ?>
    
    < src="js/jquery-331.min.js"></>
    < src="js/bootstrap-337.min.js"></>
    

</body>
</html>
<?php } ?>