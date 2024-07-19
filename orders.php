<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';
$user_id = $_SESSION['user_id'];

?>
<?php
if (isset($_POST['update_status'])) {


    if (mysqli_query($conn, "UPDATE orders SET status ='Canceled' WHERE order_id = '$_POST[update_id]'")) {

        echo "<script>alert('Booking Canceled successfully');location.href='orders.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='orders.php'</script>";
    }
}
?>
<style>
  .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .card-body img {
        border-radius: 4px;
        width: 100px;
        height: 100px;
    }

    .product-name {
        font-weight: bold;
        font-size: 18px;
    }

    .product-price {
        font-size: 16px;
    }

    .delivery-status {
        font-style: italic;
        font-weight: 600;
        margin-top: 10px;
    }

    .delivery-tag {
        margin-top: 10px;
    }


</style>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/home2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Orders</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <?php
                // Assuming $orders is an array of orders fetched from the database
                
                $sql = "SELECT p.payment_no, p.order_no, p.date, o.room_id, o.order_id, r.image1, r.price, o.status 
                FROM payment p 
                INNER JOIN `orders` o ON o.order_no = p.order_no
                INNER JOIN room r ON r.room_id = o.room_id where p.user_id ='$user_id'";

                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res)>0) {
                    while($row = mysqli_fetch_array($res)) {

                    
                ?>
                <div class="card col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="admin/images/<?php echo $row['image1']; ?>" alt="Product Image" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <p class="product-name">Payment Number: <?php echo $row['payment_no']; ?></p>
                                <p>Order Number: <?php echo $row['order_no']; ?></p>
                                <p>Price: ₹<?php echo number_format($row['price'], 2); ?></p>
                            </div>
                            <div class="col-md-3">
                                <p class="delivery-status">Booked on <?php echo date('Y-m-d', strtotime($row['date'])); ?></p>
                                <p class="delivery-tag">Status: <?php echo $row['status']; ?></p>
                                <?php
                                if($row['status']=="Booked"){
                                    ?>
                                    <form method="post">
                                        <input autocomplete="off"  type="hidden" name="update_id" value="<?php echo $row['order_id']; ?>"/>
                                        <button class="btn btn-danger" name="update_status" onClick="return confirm('Are you sure you want to Cancel Your booking?')">Cancel</button>

                                    </form>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>





                <?php }
                } else {?>
                <h2>You have not booked Yet. Please Look for good Rooms</h2>
                <?php
                }
                ?>
            </div>
        </div>
    </div>



    

<?php

require_once 'include/footer.php';

?>