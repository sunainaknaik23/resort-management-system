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
    if(!empty($_GET['roomid'])) {

        $roomid = $_GET['roomid'];
    }
    if(!empty($_SESSION['checkin'])) {

        $check_in = $_SESSION['checkin'];
    }
    if(!empty($_SESSION['checkout'])) {

        $check_out = $_SESSION['checkout'];
    }

    $sql = "SELECT * FROM room where room_id = '$roomid'";
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0) {
        $row = mysqli_fetch_array($res);

    }

    if (isset($_POST['add_submit'])) {
        $status= "Payment pending";
        $orderno = 'ORD' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $date = date('Y-m-d');
        $cust_name = $_POST['custname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $adharno = $_POST['adharno'];

        $imagePath = time() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $imagePath)) {

            if (mysqli_query($conn, "INSERT INTO orders (order_no, room_id, user_id, name, phone, address, adhar_no, 
            id_proof, check_in, check_out, status, date) VALUES ('$orderno', '$roomid', '$user_id', '$cust_name', 
            '$phone', '$address', '$adharno', '$imagePath', '$check_in', '$check_out', '$status', '$date')")) {

                echo "<script>alert('Proceed for payment');location.href='payment.php?roomid=$roomid&ordno=$orderno&custname=$cust_name'</script>";
            } else {

                echo "<script>alert('Unable to process your request!');location.href='booking.php?roomid=$roomid'</script>";
            }
        } else {

            echo "<script>alert('Unable to upload image on server.');</script>";
        }

    }

 
?>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/s2.avif);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Booking</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <!-- Room Details -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <img src="admin/images/<?php echo $row['image1']; ?>" alt="Room Image" class="img-fluid rounded">
                                </div>
                                <div class="col-md-7">
                                    <h5 class="card-title mb-3 text-primary">Room No: <?php echo $row['room_no']; ?></h5>
                                    <p class="mb-3 text-muted"><strong>Price:</strong> ₹ <?php echo $row['price']; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <hr class="my-3">
                                    <p class="mb-2"><strong>Check-In:</strong> <?php echo $check_in; ?></p>
                                    <p class="mb-0"><strong>Check-Out:</strong> <?php echo $check_out; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Payment Form -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Customer details</h5>
                            
                            <form method="post" enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <label for="cardNumber">Customer name :</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="custname" class="form-control" placeholder="Name"   required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <label for="cardNumber">Phone :</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <label for="cardNumber">Address :</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="address" name="address" class="form-control" placeholder="Address"  required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <label for="cardNumber">Id proof :</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="file" name="image" class="form-control" placeholder="proof" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <label for="cardNumber">Adhar no :</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="adharno" class="form-control" placeholder="Adhar no"  maxlength="12" pattern="\d{12}" required>
                                    </div>
                                </div>
                                
                                <button type="submit" name="add_submit" class="btn btn-primary btn-block mt-3">Continue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    

<?php

require_once 'include/footer.php';

?>