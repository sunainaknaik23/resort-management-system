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
    if(!empty($_GET['roomno'])) {

        $roomno = $_GET['roomno'];
    }
    if(!empty($_GET['payno'])) {

        $payno = $_GET['payno'];
    }
    if(!empty($_GET['amt'])) {

        $amt = $_GET['amt'];
    }
    if(!empty($_GET['custname'])) {

        $custname = $_GET['custname'];
    }

   

 
?>
<style>
        /* CSS styles for improved design */
        .container-d {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-details {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            text-align: center;
        }
        .receipt-details p {
            margin: 10px 0;
        }
        .receipt-details strong {
            font-weight: bold;
        }
        .signature {
            margin-top: 20px;
            text-align: center;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/s2.avif);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Transaction</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container-d">
            <div class="row">
                <div class="col-md-12">
                    <div class="receipt-header">
                        <h2>Room Booking Receipt</h2>
                    </div>
                    <div class="receipt-details">
                        <p><strong>Dear <?php echo $custname; ?>,</strong> Thank you for choosing our hotel for your stay. Your room has been successfully booked.</p>
                        <p><strong>Amount:</strong> <?php echo $amt; ?></p>
                        <p><strong>Room No:</strong> <?php echo $roomno; ?></p>
                        <p><strong>Payment Number:</strong> <?php echo $payno; ?></p>
                        <p>If you have any inquiries or need further assistance, please feel free to contact us.</p>
                    </div>
                    <div class="signature">
                        <p>Best Regards,</p>
                        <p>Misty River</p>
                    </div>
                    <div class="print-button">
                        <button onclick="window.print()" class="btn btn-primary">Print Receipt</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    

<?php

require_once 'include/footer.php';

?>