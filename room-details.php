<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

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

 
?>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/home2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Room details</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            <div><img src="admin/images/<?php echo $row['image1']; ?>" alt="Image" class="img-fluid"></div>
                            <div><img src="admin/images/<?php echo $row['image2']; ?>" alt="Image" class="img-fluid"></div>
                            <div><img src="admin/images/<?php echo $row['image3']; ?>" alt="Image" class="img-fluid"></div>
                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                            <strong class="text-success h1 mb-3">₹ <?php echo $row['price']; ?></strong>
                            </div>
                            <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs">Number of People</span>
                                    <span class="property-specs-number"><?php echo $row['no_of_people']; ?></span>
                                    
                                </li>
                            
                            </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Room Type</span>
                            <strong class="d-block"><?php echo $row['type']; ?></strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">No of Beds</span>
                            <strong class="d-block"><?php echo $row['no_of_bed']; ?></strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Attached Bathroom</span>
                            <strong class="d-block"><?php echo $row['bathroom']; ?></strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p><?php echo $row['description']; ?></p>

                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>
                            <div class="col-sm-3 col-md-4 col-lg-3">
                                <a href="admin/images/<?php echo $row['image1']; ?>" class="image-popup gal-item"><img src="admin/images/<?php echo $row['image1']; ?>" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <a href="admin/images/<?php echo $row['image3']; ?>" class="image-popup gal-item"><img src="admin/images/<?php echo $row['image2']; ?>" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <a href="admin/images/<?php echo $row['image3']; ?>" class="image-popup gal-item"><img src="admin/images/<?php echo $row['image3']; ?>" alt="Image" class="img-fluid"></a>
                            </div> 
                            <!-- <div class="col-sm-6 col-md-4 col-lg-6">
                                <a href="admin/images/<?php echo $row['image4']; ?>" class="image-popup gal-item"><img src="admin/images/<?php echo $row['image4']; ?>" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <a href="admin/images/<?php echo $row['image5']; ?>" class="image-popup gal-item"><img src="admin/images/<?php echo $row['image5']; ?>" alt="Image" class="img-fluid"></a>
                            </div> -->
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">

                    <h3 class="h4 text-black widget-title mb-3">Check Availability</h3>
                    <form method="post" class="form-contact-agent">
                        <div class="form-group">
                            <label for="name">Check-In Date</label>
                            <input type="date" name="checkin" id="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Check-Out Date</label>
                            <input type="date" name="checkout" id="email" required class="form-control">
                        </div>
                        <button  type="submit" name="check" class="btn btn-primary">check</button>
                    </form>
                    <?php
                    if(isset($_POST['check'])) {

                        $checkin = $_POST['checkin'];
                        $checkout = $_POST['checkout'];

                        $_SESSION['checkin'] = $checkin;
                        $_SESSION['checkout'] = $checkout;
                        $current_date = date('Y-m-d');

                        $query = "SELECT * FROM orders WHERE status = 'Booked' AND ('$checkin' BETWEEN check_in AND 
                        check_out OR '$checkout' BETWEEN check_in AND check_out) AND  room_id = '$roomid'";

                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result) > 0 || ($checkin < $current_date || $checkout < $current_date)) {
                            ?>
                            <h3 class="h4 text-black widget-title mb-3 mt-3">Sorry, the dates you selected are not available. Please check for other dates or other rooms.</h3>

                            <?php
                        } else {
                            
                            ?>
                            <h3 class="h4 text-black widget-title mb-3 mt-3">The dates you selected are available.</h3>
                            <a href="booking.php?roomid=<?php echo $row['room_id']; ?>" class="btn btn-primary">Book Now</a>
                            <?php
                        }
                    }
                    if(isset($_POST['unset'])) {
                        unset($_SESSION['checkin']);
                        unset($_SESSION['checkout']);
                    }

                    ?>

                    </div>

                    <!-- <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
                    <p>Relax in total comfort in these well-made cottages perched on top of gatikallu amidst breathtaking scenery. Decorated in subtle shades of beige, our cottages are elegantly furnished in bleached wood. You will find everything you need to relax and enjoy the serenity of Misty River.</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    

<?php

require_once 'include/footer.php';

?>