<?php 

    $customer_session = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['customer_id'];

    $customer_name = $row_customer['customer_name'];

    $customer_email = $row_customer['customer_email'];

    $customer_phone = $row_customer['customer_phone'];

    $customer_address = $row_customer['customer_address'];

    $customer_image = $row_customer['customer_image'];


?>


<h1 align="center"> Hồ sơ của tui </h1>
<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
    <label>Họ và tên : </label>
    <input type="text" name="hovaten" class="form-control" value="<?php echo $customer_name; ?>" require>
    </div> <!-- Họ tên -->

    <div class="form-group">
    <label>Email : </label>
    <input type="email" name="email" class="form-control" value="<?php echo $customer_email; ?>" require>
    </div>  <!-- Email -->

    <div class="form-group">
    <label>Số điện thoại : </label>
    <input type="text" name="sodienthoai" class="form-control" value="<?php echo $customer_phone; ?>" require>
    </div>  <!-- số điện thoại -->

    <div class="form-group">
    <label>Địa chỉ : </label>
    <input type="text" name="diachi" class="form-control" value="<?php echo $customer_address; ?>" require>
    </div>  <!-- số điện thoại -->

    <div class="form-group">
    <label>Ảnh đại diện : </label>
    <input type="file" name="avata" class="form-control" >
    <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="avata">
    </div>  <!-- avata -->

    <div class="text-center">
    <button name="update"  class="btn btn-primary">
        <i class="fa fa-user-md"></i> Cập nhật
    </button>
    </div>

</form>

<?php 

    if(isset($_POST['update'])){

        $update_id = $customer_id;

        $hovaten = $_POST['hovaten'];

        $email = $_POST['email'];

        $sodienthoai = $_POST['sodienthoai'];

        $diachi = $_POST['diachi'];

        $avata = $_FILES['avata']['name'];
        $avata_tmp = $_FILES['avata']['tmp_name'];

        move_uploaded_file ($avata_tmp,"customer_images/$avata");

        $update_customer = "update customers set customer_name='$hovaten',customer_email='$email',customer_phone='$sodienthoai'
        ,customer_address='$diachi',customer_image='$avata' where customer_id='$update_id'";

        $run_customer = mysqli_query($con,$update_customer);

        if($run_customer){

            echo "<script>alert('Cập nhật tài khoản thành công. Vui lòng đăng nhập lại')</script>";

            echo "<script>window.open('../logout.php','_self')</script>";

        }
    }


?>