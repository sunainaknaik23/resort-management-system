<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
<style>
@media (min-width: 768px) {
  .site-section {
    padding: 0 0 !important;
}
}

</style>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/m3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Packages</h1>
          </div>
        </div>
      </div>
    </div>
    <?php
     $sql = "SELECT * FROM packages";
     $res = mysqli_query($conn,$sql);

     if(mysqli_num_rows($res)>0) {
         while($row = mysqli_fetch_array($res)){
    ?>
    

    <div class="site-section mt-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <img src="admin/images/<?php echo $row['image'] ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-7 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2><?php echo $row['title'] ?></h2>
            </div>
            <p class="lead"><?php echo $row['description'] ?></p>
           
          </div>
        </div>
      </div>
    </div>
    <?php
         }
        }
        ?>
<!-- <div class="site-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <img src="images/dining1.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-7 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2>Restaurant</h2>
            </div>
            <p class="lead">Offers a delightful culinary experience, blending local flavors with global cuisines, served in picturesque settings amidst the serene surroundings. 
            We offer not just a meal but a culinary journey, allowing guests to immerse themselves in the flavors of the region while enjoying the natural beauty that surrounds them. </p>
            </div>
        </div>
      </div>
  </div>
    <div class="site-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <img src="images/indoor.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-7 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2>Indoor Games</h2>
            </div>
            <p class="lead">We offer a variety of indoor games to ensure guests have an enjoyable time even when they're not exploring the outdoors. 
              Such as Table tennis,Carrom,Chess,Card games these indoor games cater to a wide range of interests and preferences, ensuring that guests have plenty of options for entertainment during their stay at Misty River, regardless of the weather or time of day.</p>
            </div>
        </div>
      </div>
    </div>
    <div class="site-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <img src="images/outdoor.jpeg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-7 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2>Outdoor Games</h2>
            </div>
            <p class="lead">We often boast a plethora of outdoor games and activities, taking advantage of the region's stunning natural landscapes and pleasant climate. These outdoor pursuits provide guests with opportunities for adventure, recreation, and relaxation amidst the beauty of Chikmagalur
            For thrill-seekers, we organize adventure activities such as zip-lining, rappelling, or rock climbing.By offering guests an exhilarating way to experience the rugged terrain and scenic beauty of Chikmagalur
            </p>
            </div>
        </div>
      </div>
    </div>

    <div class="site-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <img src="images/POOL.jpg"alt="Image" class="img-fluid">
          </div>
          <div class="col-md-7 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2>Multi-Utility Pool</h2>
            </div>
            <p class="lead">Equipped with the diverse needs and preferences of guests, offering a versatile and enjoyable aquatic experience that enhances their overall stay at the resort. Whether it's swimming laps, relaxing , or enjoying water games with the family, guests can make the most of their leisure time in and around the pool area./p>
            </div>
        </div><
      </div>
    </div>

    <div class="site-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <img src="images/mist7.jpg"alt="Image" class="img-fluid">
          </div>
          <div class="col-md-7 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2>Camp Fire</h2>
            </div>
            <p class="lead">Offering guests a cozy and atmospheric setting to gather around, socialize, and enjoy the warmth of a crackling fire under the starlit sky by experiencing scenic location and  live music or entertainment</p>
            </div>
        </div>
      </div>
    </div> -->
  
  
  
  


    
<?php

require_once 'include/footer.php';

?>