<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/v2.webp);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Rooms</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section site-section-sm bg-light">
      <div class="container">
      
        <div class="row mb-5">
            <?php
                $sql = "SELECT * FROM room where status = 'Active'";
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res)>0) {
                    while($row = mysqli_fetch_array($res)){
                        $words = preg_split("/\s+/", $row['description']);
                        $first_10_words = array_slice($words, 0, 13);
                        $short_description = implode(' ', $first_10_words);

                ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="room-details.php?roomid=<?php echo $row['room_id']; ?>" class="property-thumbnail">
                        <img src="admin/images/<?php echo $row['image1']; ?>" alt="Image" class="img-fluid">
                    </a>
                    <div class="p-4 property-body">
                        <h2 class="property-title"><a href="room-details.php?roomid=<?php echo $row['room_id']; ?>">Room No : <?php echo $row['room_no']; ?></a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $short_description; ?></span>
                        <strong class="property-price text-primary mb-3 d-block text-success">₹ <?php echo $row['price']; ?></strong>
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                            <li>
                                <span class="property-specs">Beds</span>
                                <span class="property-specs-number"><?php echo $row['no_of_bed']; ?></span>
                                
                            </li>
                            <li>
                                <span class="property-specs">Attached Bathroom</span>
                                <span class="property-specs-number"><?php echo $row['bathroom']; ?></span>
                                
                            </li>
                            <li>
                                <span class="property-specs">Type</span>
                                <span class="property-specs-number"><?php echo $row['type']; ?></span>
                                
                            </li>
                            <li>
                                <span class="property-specs">People</span>
                                <span class="property-specs-number"><?php echo $row['no_of_people']; ?></span>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                ?>

          
        
        
      </div>
    </div>

<?php

require_once 'include/footer.php';

?>