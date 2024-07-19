<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
<?php
    if(isset($_POST['add_submit'])){

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    
        $insertQuery = "INSERT INTO feedback (name, email, phone, subject, message) VALUES ('$name', '$email', 
        '$phone', '$subject', '$message')";
    
        if (mysqli_query($conn, $insertQuery)) {
    
            echo "<script>alert('Feedback sent successfully');location.href='feedback.php'</script>";
        } else {
            echo "<script>alert('Unable to process your request!');location.href='feedback.php'</script>";
        }
        
    }
 
?>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/home2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Feedback</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form method="post" class="p-5 bg-white border">

                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="fullname">Full Name</label>
                        <input type="text" name ="name" class="form-control" placeholder="Full Name">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="email">Email</label>
                        <input type="email" name ="email" class="form-control" placeholder="Email Address">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="phone">Phone</label>
                        <input type="phone" name ="phone" class="form-control" placeholder="Phone No">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="email">Subject</label>
                        <input type="text" name ="subject" class="form-control" placeholder="Enter Subject">
                    </div>
                </div>
                

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="message">Message</label> 
                        <textarea name="message" name ="message" cols="30" rows="5" class="form-control" placeholder="Give us feedback"></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                    <button type="submit" name="add_submit" class="btn btn-primary  py-2 px-4 rounded-0">Send</button>
                    </div>
                </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h6 text-black mb-3 text-uppercase">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">Misty River Resort Kadabgere,Chikmagalur-562130</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">6361787215</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">praveensaldanha@gmail.com</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </div>

    

<?php

require_once 'include/footer.php';

?>