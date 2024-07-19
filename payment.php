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
    if(!empty($_GET['ordno'])) {

        $ordno = $_GET['ordno'];
    }
    if(!empty($_GET['custname'])) {

        $custname = $_GET['custname'];
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
        $status= "Booked";
        $paymentno = 'PMT' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $amount = $_POST['amount'];
        $roomno = $_POST['roomno'];
        $date = date('Y-m-d');
        $card_no = $_POST['cardNumber'];
        $card_exp_month = $_POST['expiryMonth'];
        $card_exp_year = $_POST['expiryYear'];
        $cvv = $_POST['cvv'];

        $insertQuery = "INSERT INTO payment (payment_no, order_no, user_id, card_no, card_exp_month , card_exp_year, 
        cvv, amount, date) VALUES ('$paymentno', '$ordno', '$user_id', '$card_no', '$card_exp_month', 
        '$card_exp_year', '$cvv', '$amount', '$date')";

            if (mysqli_query($conn, $insertQuery)) {

                $updatequery = "UPDATE orders SET status = '$status' where order_no = '$ordno'";

                if (mysqli_query($conn, $updatequery)) {

                    unset($_SESSION['checkin']);
                    unset($_SESSION['checkout']);

                echo "<script>alert('Room Booked successfully');location.href='transaction.php?custname=$custname&roomno=$roomno&payno=$paymentno&amt=$amount'</script>";
            } else {
                echo "<script>alert('Unable to process your request!');location.href='payment.php?roomid=$roomid&ordno=$ordno&custname=$custname'</script>";
            }
        } else {
            echo "<script>alert('Unable to process your request!');location.href='payment.php?roomid=$roomid&ordno=$ordno&custname=$custname'</script>";
        }

    }

 
?>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/s2.avif);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Payment</h1>
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
                            <h5 class="card-title mb-3">Total amount</h5>
                            <p class="mb-3 text-muted"><strong>Price:</strong> ₹ <?php echo htmlspecialchars($row['price']); ?></p>
                            <h5 class="card-title mb-3">Payment Details</h5>
                            <form method="post">
                                <div class="form-group">
                                    <label for="cardNumber">Card Number:</label>
                                    <input type="text" name="cardNumber" class="form-control" placeholder="Enter Card Number"  maxlength="16" pattern="\d{16}" required>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="expiryMonth">Expiry Month:</label>
                                        <select name="expiryMonth" class="form-control" required>
                                            <option value="" disabled selected>Select Month</option>
                                            <option value="01">Jan</option>
                                            <option value="02">Feb</option>
                                            <option value="01">mar</option>
                                            <option value="02">apr</option>
                                            <option value="01">may</option>
                                            <option value="02">jun</option>
                                            <option value="01">Jul</option>
                                            <option value="02">aug</option>
                                            <option value="01">sept</option>
                                            <option value="02">oct</option>
                                            <option value="01">nov</option>
                                            <option value="02">dec</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="expiryYear">Expiry Year:</label>
                                        <select name="expiryYear" class="form-control" required>
                                            <option value="" disabled selected>Select Year</option>
                                            <?php
                                            $currentYear = date('Y');
                                            $endYear = $currentYear + 10;
                                            for ($year = $currentYear; $year <= $endYear; $year++) {
                                                echo "<option value='$year'>$year</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="cvv">CVV:</label>
                                        <input type="text" name="cvv" class="form-control" placeholder="Enter CVV" maxlength="3" required>
                                    </div>
                                </div>
                                <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="roomno" value="<?php echo $row['room_no']; ?>">
                                <button type="submit" name="add_submit" class="btn btn-primary btn-block mt-3">Pay Now</button>
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