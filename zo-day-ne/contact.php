<?php
    $active='CONTACT';
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
                        Contact 
                    </li>
                </ul>
            </div>
            
            <div class="col-md-12">
               <div class="box">
                   <div class="box-header">
                       <center>
                           <h2>Liên hệ với chung tôi</h2>
                           <p class="text-muted">
                               Hãy gửi ý kiến cho chúng tôi
                           </p>
                       </center>
                       <form action="contact.php" method="POST">
                           <div class="form-group">
                               <label>Tên</label>
                               <input type="text" class="form-control" name="ten" required>
                           </div>
                           <div class="form-group">
                               <label>Email</label>
                               <input type="text" class="form-control" name="email" required>
                           </div>
                           <div class="form-group">
                               <label>Điện thoại</label>
                               <input type="number" class="form-control" name="sodienthoai" required>
                           </div>
                           <div class="form-group">
                               <label>Lời nhắn</label>
                               <textarea name="loinhan" class="form-control"></textarea>
                           </div>
                           <div class="text-center">
                               <button type="submit" name="submit" class="btn btn-primary">
                               <i class="fa fa-user-md"></i> Gửi
                               </button>
                           </div>
                       </form>
                    <?php
                    
                        if(isset($_POST['submit'])){

                            // admin nhận được thông tin khách gửi //

                            $sender_ten = $_POST['ten'];

                            $sender_email = $_POST['email'];

                            $sender_sodienthoai = $_POST['sodienthoai'];

                            $sender_loinhan = $_POST['loinhan'];

                            $receiver_email = "buingocminhquang@gmail.com";

                            mail($receiver_email,$sender_ten,$sender_sodienthoai,$sender_loinhan,$sender_email);

                            // trả lời tin nhắn tự đông với nội dung này //

                            $email = $_POST['email'];

                            $subject = "5THEWAY xin chào!";
                            
                            $msg = "Cảm ơn bạn đã gửi tin nhắn cho chúng tôi. Chúng tôi sẽ phản hồi nhanh nhất có thể. Xin cảm ơn!";

                            $from = "buingocminhquang@gmail.com";

                            mail($email,$subject,$msg,$from);

                            echo "<h2 align='center'> Phản hồi của bạn đã được gửi! </h2>";

                            

                        }
                    
                    
                    ?>



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