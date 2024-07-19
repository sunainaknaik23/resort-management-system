<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>


<div class="slide-one-item home-slider owl-carousel">

<div class="site-blocks-cover overlay" style="background-image: url(images/home2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10">
        <h1 class="mb-2">Welcome to Misty River Resort</h1>
      </div>
    </div>
  </div>
</div>  

<div class="site-blocks-cover overlay" style="background-image: url(images/POOL.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10">
        <h1 class="mb-2">Welcome to Misty River Resort</h1>
      </div>
    </div>
  </div>
</div>  

</div>





  <div class="site-section site-section-sm bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center">
          <div class="site-section-title">
            <h2>Gallery</h2>
              <div class="row no-gutters mt-5">
                <?php
                $sql = "SELECT * FROM gallery where status = 'Active'";
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res)>0) {
                    while($row = mysqli_fetch_array($res)){
                ?>
                <div class="col-lg-4">
                  <a href="admin/images/<?php echo $row['image']; ?>" class="image-popup gal-item"><img src="admin/images/<?php echo $row['image']; ?>" alt="Image" class="img-fluid"></a>
                </div>
                <?php
                    }
                  }
                  ?>
                
                
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="site-section">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7 text-center">
      <div class="site-section-title">
        
      </div>
      <p><b>Nestled in the wilderness of Chikmagalur, this resort offers a destination with a meaning, and is the epitome of barefoot luxury. Discover a place to connect with something larger than yourself; a new haven for the adventurer, a getaway for the wanderer, and a solitude for the endlessly passionate and curious.</b></p>
    </div>
  </div>

  
   
    <div class="row" >
      <div class="col-md-4">
        <a href="#" class="service text-center" >
          <span class="icon"><i class="bi bi-geo-alt"></i></span>
          <h2 class="service-heading">Location</h2>
          <p>Misty River Resort ,prabhat nagar honnavar-562130</p>
         
        </a>
      </div> 
      <div class="col-md-4">
        <a href="#" class="service text-center" >
          <span class="icon"><i class="bi bi-telephone-fill"></i></span>
          <h2 class="service-heading">Contact</h2>
          <p>naina.artistry,6361787215</p>
        
        </a>
      </div> 
      <div class="col-md-4">
        <a href="#" class="service text-center" >
          <span class="icon"><i class="bi bi-envelope-fill"></i></span>
          <h2 class="service-heading">Email</h2>
          <p>mistyriver@gmail.com</p>
         
        </a>
      </div>    
      
    </div>
  </div>
</div> 
    





<?php

require_once 'include/footer.php';

?>