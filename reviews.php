<?php

$conn = new mysqli("localhost", "root", "", "hopcare");

$sql = "SELECT client, review_text, review_date FROM reviews ORDER BY review_date DESC";
$result = $conn->query($sql);

$reviews = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
} else {
    $no_reviews = true;
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
  <title>Hands of Peace</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" /> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" /> -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
        .reviews {
            margin: 20px;
        }
        .review {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
        }
        .no-reviews {
            text-align: center;
            font-size: 18px;
            color: #888;
        }
</style>

</head>

<body class="sub_page">
  <div class="hero_area">
        
    <header class="header_section">
      
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="" href="index.html">
              <img src="images/logo.png" height="70px" width="80px" style="border-radius: 50%;">
             </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link active" href="index.html">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link " href="service.html">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reviews.php">Reviews</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html#contact">Contact Us</a>
                </li>
               
              </ul>
            </div>
          </nav>
        </div>
      </div>
  </header>
      </div>
        <div class="container">
            <div class="review-form">
                <h2>Add Review</h2>
                <form action="submit.php" method="post">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Review:</label>
                        <textarea name="review_text" rows="5" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    <section class="client_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2 style="color:white;">
          Client Reviews
        </h2>
        <hr>
      </div>
     
        <div class="reviews">
                <?php if (isset($no_reviews) && $no_reviews): ?>
                <div class="no-reviews">No reviews yet</div>
                <?php else: ?>
                <?php foreach ($reviews as $review): ?>
                <div class="review" style="background-color: #f1e9e9">
                <h3><?php echo htmlspecialchars($review['client']); ?></h3>
                <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                <small><?php echo date('F j, Y, g:i a', strtotime($review['review_date'])); ?></small>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
        </div>

          
    </div>
</section>
<section class="info_section ">
    <div class="container" >
      <div class="info_top">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <a class="navbar-brand" href="index.html">
              Hands Of Peace Homecare Inc.
            </a>
          </div>
          <div class="col-md-4 col-sm-12" >
            <div class="info_contact" >
              <div>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  107-2760 Carousel Crescent <br> Ottawa Ontario ON K1T 2N4
                </span> 
              </div>
            </div>
            </div>
            <div class="col-md-3">
              <div>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  <a href="tel:+16138693240" style="text-decoration: none; color: honeydew">
                    +1 (613) 8693240</a> 
                </span>
              </div>
              <div>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  <a href="tel:+16138573240" style="text-decoration: none; color: honeydew">
                    +1 (613) 8573240</a> 
                </span>
              </div>
            </div>
          
        </div>
      </div><br>
      <div class="info_bottom">
        <div class="row" style="padding-left: 0; justify-content: space-between;">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="info_detail">
              <h5>
                Company
              </h5>
              <p>
                Hands of Peace Homecare Inc. where our mission is to provide compassionate, personalized abd professional services to individuals in the
              comfort of their homes.
              </p>
            </div>
          </div>
          
          <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="info_detail">
              <h5>
                Email
              </h5>
              <a href="" style="text-decoration: none; color: honeydew;">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  <a href="mailto: jackiewalugembe@handsofpeacecare.com" style="text-decoration: none; color: honeydew">jackiewalugembe@handsofpeacecare.com</a>
                </span><br>
              </a>
              <a href="" style="text-decoration: none; color: honeydew">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  <a href="mailto: mmmagezi@handsofpeacecare.com" style="text-decoration: none; color: honeydew">mmmagezi@handsofpeacecare.com</a>
                </span>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-5 col-sm-12">
            <div class="">
              <h5>
                Useful links
              </h5>
              <ul class="info_menu">
                <li>
                  <a href="index.html">
                    Home
                  </a>
                </li>
                <li>
                  <a href="about.html">
                    About
                  </a>
                </li>
                <li>
                  <a href="service.html">
                    Services
                  </a>
                </li>
                <li>
                  <a href="team.html">
                    Team
                  </a>
                </li>
                <li class="mb-0">
                  <a href="contact.html">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="index.html/">Hands of Peace Homecare Inc</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
</body>