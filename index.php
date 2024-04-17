<?php require_once('./config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap">
<link rel="stylesheet" href="plugins/animate.css-main/animate.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-cI5O7pHu1lRzzGzZj2QUiH7v2vVWrrn3b/2Jcw6+RuEzQs4nCXNJ3XSu17TT2JFfqAmw1MK4LpJ66/cJ/JbSiA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
<style>

  :root {
  --night-green: rgb(0, 13, 10);
  --dark-green: rgba(34, 86, 1);
  --light-green: rgba(72, 170, 9);
  --yellow-green: rgb(151, 251, 0);
  --white-smoke: #f0f0f0;
  --night-rider: #343434;
  --black: #191b17;
  --transition: all 0.5s ease-in-out;
  --yellow: #ffbd13;
  --light: #f5f5f5;
  --grey: #aaa;
  --white: #fff;
  --shadow: 8px 8px 30px rgba(0, 0, 0, 0.05);
}

html {
  color: var(--black);
  font-size: 1rem;
  font-weight: 300;
  line-height: 1.5;
  text-rendering: optimizeLegibility;
  scroll-behavior: smooth;
}

body, h1, h2, h3, h4, h5, h6, p, span, div, button {
    font-family: 'Poppins', sans-serif;
}

  #header {
    height: 100vh;
    width: 100%;
    position: relative;
    top: -5em;
    background-color: 
    #437ABD;
        font-family: 'Poppins', sans-serif;
    
  }
  #header:before {
    content: "";
    position: absolute;
    height: 100%;
    width: 100%;
    background-image: url(<?= validate_image($_settings->info("cover")) ?>);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    background-color: black;
  }

  
  #header > div {
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 2;
    
  }

  #top-Nav a.nav-link.active {
    color: #f8f9fa;
    font-weight: 900;
    position: relative;
  }
  #top-Nav a.nav-link.active:before {
    content: "";
    position: absolute;
    border-bottom: 2px solid #f8f9fa;
    width: 33.33%;
    left: 33.33%;
    bottom: 0;
        font-family: 'Poppins', sans-serif;
  }
  

  .content{
    background-color: "blue";
  }
  .site-title {
    font-family: Arial, sans-serif; 
  }
  
 
  .centered {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

.headertext{
  font-size: 10px;
      font-family: 'Poppins', sans-serif;
}

  .our-services{
    color: white;
    padding-top: 30px;
  }


   body {
   
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
                background-color: 
    #437ABD;
            background-image: url('/uploads/Dog-Grooming-Photo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }


  .service-columns {
    display: flex;
    justify-content: space-around;
    text-align: center;
     background-color: white;
    margin-top: 40px;
        font-family: 'Poppins', sans-serif;
  }

  .service-column {
   position: relative;
    flex: 1;
     background-color: white;
    margin: 0 10px;
  }

 
  .service-column ul {
    padding: 0;
    
    list-style-type: none;
  }
  .service-column ul li {
    padding: 5px 0;
    transition: all 0.3s ease;
  }

  .service-column ul li:hover {
    transform: scale(1.05);
    background-color: #333;
    color: #fff;
    cursor: pointer;
  }

.service-column {
    flex: 1;
    position: relative;
    margin: 0 10px;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.service-items {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Distribute items evenly */
}

.service-item {
    text-align: center;
    margin: 10px;
    flex-basis: calc(25% - 20px); /* Four items per row */
}

.service-item i {
    font-size: 48px; /* Adjust icon size */
    margin-bottom: 10px;
    color: #333; /* Change color as needed */
    transition: all 0.3s ease; /* Add smooth transition */
}

.service-item i:hover {
    color: #FF5733; /* Change color on hover */
    transform: scale(1.1); /* Scale icon on hover */
}

.service-item span {
    font-size: 16px; /* Adjust text size */
    color: #555; /* Change color as needed */
    display: block; /
}

.services-content{
  height: 100vh;
      background-color: 
    #437ABD;
}


.location-content{
    background-color: 
    #437ABD;
  margin-top: 50px;
  color: black;
   height: 150vh;
       font-family: 'Poppins', sans-serif;
}


.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.aboutus-content {
        background-color: 
    #437ABD;
        font-family: 'Poppins', sans-serif;
   
}

.our-services {
    text-align: center;
        font-family: 'Poppins', sans-serif;
}

.about-section {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: relative;
}

.about-section img {
    position: absolute;
    width: 200px;
    height: auto;
}

.about-text {
    font-size: 18px;
    line-height: 1.6;
    color: #555;
    padding-right: 170px;
    padding-bottom: 170px;
}

.about-us{
  width: 100%;
      font-family: 'Poppins', sans-serif;
}


.home-button{
  height: 50px;
  width: auto;
  background-color: white;
  color: black;
  font-size: 12;
  margin-top: 100px;
     font-family: 'Poppins', sans-serif;
   border-radius: 20px;
   
}

.image-gallery {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.image-item {
  flex-basis: calc(25% - 20px); 
  margin-bottom: 20px; 
}

.image-item img {
  max-width: 100%;
  height: auto;
  display: block; 
}


 #map {
      height: 400px;  
      width: 100%;    
    }



    .dog-images-content{
      height: 40vh;
          font-family: 'Poppins', sans-serif;
    }
.award-images-content{
      height: 50vh;
          font-family: 'Poppins', sans-serif;
    }

     .accordion-btn {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        transition: 0.4s;
    }

    .accordion-panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .accordion-btn.active,
    .accordion-btn:hover {
        background-color: #ccc;
    }

    .accordion-btn:after {
        content: '\02795';
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    .accordion-btn.active:after {
           content: "\2796";
    }

    .faqs-content{
          font-family: 'Poppins', sans-serif;
      margin-top: 50px;
      height: 100vh;
          background-color: 
    #437ABD;
    }


    .popup {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        padding: 10px;
        color: black;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 1;
        width: 300px; 
        left: calc(50% - 150px); 
        animation: fadeIn 1.5s ease-in-out; 
    }

    .service-item:hover .popup {
        display: block;
    }
     @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
</style>


<?php require_once('inc/header.php') ?>
  <body class="layout-top-nav " style="height: auto;">
    <div class="wrapper">
     <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
     <?php require_once('inc/topBarNav.php') ?>
     <?php if($_settings->chk_flashdata('success')): ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
      </script>
      <?php endif;?>    
  <div id="home" class="content-wrapper pt-5 d-flex justify-content-center ">
    <?php if($page == "home" || $page == "about_us"): ?>
        <div id="header" class="shadow mb-4">
            <div class="centered px-1">
                <div class="row justify-content-center">
                   <div class="col-12 col-md-6 text-center">
                        <h1 class="animate__animated animate__fadeInUp animate__slow   headertext site-title" style="font-family: Arial, sans-serif;"><?php echo $_settings->info('name') ?></h1>
                    </div>
                <div class="col-12 col-md-6 text-center mt-5 ">
                       <button onclick="proceedToAdmin()" class="animate__animated animate__fadeInUp animate__slow btn-round home-button">Book Appointment Now</button>
                    </div>
                   
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>


  <section id="services" class="services-content">
    <div class="container">
      <?php 
        if(!file_exists($page.".php") && !is_dir($page)){
            include '404.html';
      } else {
      }
      ?>

      <div class="animate__animated animate__fadeInUp animate__slow our-services">
        <h1 style="text-align: center; color: white; font-size: 50px">Our Services</h1>
        <div class="service-columns text-align: center;">
          <div class="service-column">
            <h3 style="color:black">Full Grooming</h3>
            <br>
            <br>
            <div class="service-items">
              <!-- Service Item 1: Blow and Dry -->
              <div class="service-item">
                <i class="fas fa-wind"></i>
                <span>Blow and Dry</span>
                <div class="popup">
                  <p>This service includes a gentle blow-dry to remove excess moisture from your pet's coat after a bath.</p>
                  <p>Blow and Dry helps in preventing matting and provides a smooth finish to your pet's fur.</p>
                </div>
              </div>
              <!-- Service Item 2: Haircut -->
              <div class="service-item">
                <i class="fas fa-cut"></i>
                <span>Haircut</span>
                <div class="popup">
                  <p>Our haircut service involves a professional grooming session to trim your pet's fur to your desired length and style.</p>
                  <p>We offer various haircut options, including breed-specific cuts and customized styles based on your preferences.</p>
                </div>
              </div>
              <!-- Service Item 3: Hair Brushing -->
              <div class="service-item">
                <i class="fas fa-brush"></i>
                <span>Hair Brushing</span>
                <div class="popup">
                  <p>Our hair brushing service involves gently removing tangles and knots from your pet's fur using specialized brushes.</p>
                  <p>Regular hair brushing helps to distribute natural oils, promotes healthy skin and coat, and reduces shedding.</p>
                </div>
              </div>
              <!-- Service Item 4: Nail Trimming -->
              <div class="service-item">
                <i class="fas fa-paw"></i>
                <span>Nail Trimming</span>
                <div class="popup">
                  <p>Nail trimming is an essential part of pet grooming to maintain your pet's overall health and well-being.</p>
                  <p>We carefully trim your pet's nails to the appropriate length, ensuring they are comfortable and free from overgrowth.</p>
                </div>
              </div>
              <!-- Service Item 5: Ear Cleaning -->
              <div class="service-item">
                <i class="fas fa-ear"></i>
                <span>Ear Cleaning</span>
                <div class="popup">
                  <p>Ear cleaning helps to remove dirt, wax, and debris from your pet's ears, preventing infections and discomfort.</p>
                  <p>We use gentle solutions and techniques to clean your pet's ears safely and effectively.</p>
                </div>
              </div>
              <!-- Service Item 6: Anal Gland -->
              <div class="service-item">
                <i class="fas fa-biohazard"></i>
                <span>Anal Gland</span>
                <div class="popup">
                  <p>Anal gland expression is a procedure to empty the anal glands, which can become impacted or infected if not properly maintained.</p>
                  <p>Our trained groomers perform this task with care and expertise to ensure your pet's comfort and health.</p>
                </div>
              </div>
              <!-- Service Item 7: Toothbrushing -->
              <div class="service-item">
                <i class="fas fa-tooth"></i>
                <span>Toothbrushing</span>
                <div class="popup">
                  <p>Toothbrushing is an important aspect of pet dental care to prevent plaque and tartar buildup, gum disease, and bad breath.</p>
                  <p>We use pet-friendly toothpaste and brushes to clean your pet's teeth gently and effectively.</p>
                </div>
              </div>
              <!-- Service Item 8: Cologne Spray -->
              <div class="service-item">
                <i class="fas fa-spray-can"></i>
                <span>Cologne Spray</span>
                <div class="popup">
                  <p>Our cologne spray leaves your pet smelling fresh and clean between grooming sessions.</p>
                  <p>We use pet-safe fragrances to add a pleasant scent to your pet's coat, enhancing their overall grooming experience.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="service-column">
            <h3 style="color:black">Other Services</h3>
            <br>
            <br>
            <div class="service-items">
              <!-- Service Item 9: Dematting -->
              <div class="service-item">
                <i class="fas fa-cut"></i>
                <span>Dematting</span>
                <div class="popup">
                  <p>Dematting involves removing mats and tangles from your pet's coat, which can cause discomfort and skin irritation.</p>
                  <p>Our dematting service uses specialized tools and techniques to gently untangle knots and mats without causing pain to your pet.</p>
                </div>
              </div>
              <!-- Service Item 10: Deshedding -->
              <div class="service-item">
                <i class="fas fa-wind"></i>
                <span>Deshedding</span>
                <div class="popup">
                  <p>Deshedding helps to reduce shedding and minimize pet hair around your home.</p>
                  <p>We use high-quality deshedding tools and products to remove loose fur and undercoat, leaving your pet's coat smooth and shiny.</p>
                </div>
              </div>
              <!-- Service Item 11: Pet Care & Boarding -->
              <div class="service-item">
                <i class="fas fa-dog"></i>
                <span>Pet Care & Boarding</span>
                <div class="popup">
                  <p>Our pet care and boarding services provide a safe and comfortable environment for your pet while you're away.</p>
                  <p>We offer personalized care, including feeding, exercise, and companionship, to ensure your pet's well-being and happiness.</p>
                </div>
              </div>
              <!-- Add more services here if needed -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<section id="dog-images" class="dog-images-content">
  <div class="container">
    <!-- Check if the page exists or is a directory -->
    <?php 
      // Array of dog image file names
      $dogImages = array("dog1.jpg", "dog2.jpg", "dog3.jpg", "dog4.jpg", "dog5.jpg", "dog6.jpg");

      if(!file_exists($page.".php") && !is_dir($page)){
          include '404.html';
      } else {
    ?>
    <!-- Dog Images Section -->
    <div class="our-services">
      <h1 style="text-align: center; font-style: italic; color:#437ABD;">Gallery</h1>
      <!-- Image Carousel -->
      <div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php 
            // Chunk the dog images array into groups of 4
            $chunks = array_chunk($dogImages, 4);

            // Loop through each group of images
            foreach ($chunks as $key => $chunk) {
              // Check if it's the first group, set active class accordingly
              $activeClass = ($key == 0) ? 'active' : '';
          ?>
          <div class="carousel-item <?php echo $activeClass; ?>">
            <div class="row">
              <?php 
                // Loop through each image in the current group
                foreach ($chunk as $image) {
              ?>
              <div class="col-md-3">
                <img src="uploads/<?php echo $image; ?>" class="d-block w-100" alt="<?php echo $image; ?>">
              </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- End of Dog Images Section -->
    <?php } ?>
  </div>
</section>


<section id="dog-images" class=".award-images-content">
  <div class="container">
    <!-- Check if the page exists or is a directory -->
    <?php 
      // Array of dog image file names
      $dogImages = array("award.jpg");
      
      if(!file_exists($page.".php") && !is_dir($page)){
          include '404.html';
      } else {
    ?>
    <!-- Dog Images Section -->
    <div class="our-services">
      <h1 style="text-align: center; font-style: italic; color:#437ABD;">Awards</h1>
      <!-- Image Carousel -->
      <div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php 
            // Loop through each image
            foreach ($dogImages as $key => $image) {
              // Check if it's the first image, set active class accordingly
              $activeClass = ($key == 0) ? 'active' : '';
          ?>
          <div class="carousel-item <?php echo $activeClass; ?>">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <img src="uploads/<?php echo $image; ?>" class="d-block mx-auto" style="max-width: 100%;" alt="<?php echo $image; ?>">
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- End of Dog Images Section -->
    <?php } ?>
  </div>
</section>


<section id="location" class="location-content">
    <div class="container">
        <?php 
            if(!file_exists($page.".php") && !is_dir($page)){
                include '404.html';
            } else {
        ?>

        <div class="our-services">
            <h1 style="text-align: center; font-style: italic; color: white;">Location Map</h1>
            <br>
            <br>
            <br>
            <p style="text-align: center; font-style: italic; color: white;">Exact Location:</p>
            <p style="text-align: center; font-style: italic; color: white;">Mang Art's Commercial Building - 845 Dra. Salamanca Road, San Roque, Cavite City</p>
            <div id="map"></div>
            <br>
            <br>
            <h1 style="text-align: center; font-style: italic; color: white;">Contact Us</h1>
            <p style="text-align: center; font-style: italic; color: white;">Reach us out with our email and phone number:</p>

            <div class="service-columns text-align: center; color: white;">
                <div class="service-column" style="color: black;">
                    <p><i class="fa fa-envelope"></i> Email: candcpetgrooming@gmail.com</p>
                </div>
                <div class="service-column" style="color: black;">
                    <p><i class="fa fa-phone"></i> Contact #: 0927 475 0756</p>
                </div>
            </div>
            <br>
            <p style="text-align: center; font-style: italic; color: white;">Social Media Sites</p>
            <div style="text-align: center;">
                <a href="https://www.facebook.com/profile.php?id=61550050215984" target="_blank" style="display: inline-block; background-color: #3b5998; padding: 10px 20px; border-radius: 50%; text-decoration: none;">
                    <i class="fab fa-facebook-f" style="color: white;"></i>
                </a>   
            </div>
        </div>
        <?php } ?>
    </div>
</section>


<section id="about" class="aboutus-content" style="background-color: #f5f5f5;">
    <?php 
    if(!file_exists($page.".php") && !is_dir($page)){
        include '404.html';
    } else {
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="about-text text-center" style="font-family: 'Poppins', sans-serif;">
                    <h1>About Us</h1>
                    <p>Welcome to C & C Pet Grooming & Supplies, your premier destination for premium pet grooming services, high-quality pet supplies, and top-notch pet hotel accommodations. Located in the heart of Cavite City, specifically at Mang Art's Commercial Building on Dra. Salamanca Road, our establishment has been proudly serving the local community since August 2023.</p>
                    <p>Our grooming salon is staffed by a team of experienced and skilled groomers dedicated to providing top-notch care for every pet that walks through our doors. From bathing and brushing to nail trimming and styling, we offer a comprehensive range of grooming services tailored to meet the unique needs of each individual pet.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="about-text text-center" style="font-family: 'Poppins', sans-serif;">
                    <p>In addition to our grooming services and pet supplies, we also provide pet hotel accommodations for those times when you need to be away from your furry companions. Our pet hotel offers a safe, comfortable, and nurturing environment where your pets can relax and enjoy their stay while you're traveling or unavailable to care for them.</p>
                    <p>At C & C Pet Grooming & Supplies, we prioritize the well-being and satisfaction of both pets and pet owners alike. Our friendly and knowledgeable staff are always on hand to provide expert advice, personalized recommendations, and assistance with all your pet-related needs.</p>
                    <p>Whether you're a long-time customer or visiting us for the first time, we strive to create a welcoming and enjoyable experience for you and your furry friends. Thank you for choosing C & C Pet Grooming & Supplies as your trusted partner in pet care. We look forward to serving you and your pets for many years to come!</p>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
</section>




<section id="faqs" class="faqs-content">
    <div class="container">
        <?php 
            if(!file_exists($page.".php") && !is_dir($page)){
                include '404.html';
            } else {
        ?>

        <div class="faqs-main-content">
            <h1 style="text-align: center; font-style:italic; color:white">FAQS</h1>
            
            <div class="accordion">
                <button class="accordion-btn">1. What services do you offer at C & C Dog Grooming & Supplies?</button>
                <div class="accordion-panel">
                    <p>At C & C, we offer a comprehensive range of services including professional dog grooming, bathing, nail trimming, ear cleaning, hair trimming, and specialized breed-specific grooming. Additionally, we provide a variety of high-quality pet supplies including food, toys, accessories, and grooming products.</p>
                </div>

                <button class="accordion-btn">2. How often should I groom my dog?</button>
                <div class="accordion-panel">
                    <p>The frequency of grooming depends on your dog's breed, coat type, and lifestyle. We recommend scheduling grooming appointments at least once every 4-8 weeks to maintain your dog's health and appearance. Our experienced groomers can provide personalized recommendations based on your dog's specific needs.</p>
                </div>

                <button class="accordion-btn">3. Can I purchase pet supplies without scheduling a grooming appointment?</button>
                <div class="accordion-panel">
                    <p>Absolutely! Our pet shop is open for walk-in customers to browse and purchase a wide selection of pet supplies. Whether you're looking for premium dog food, durable toys, stylish accessories, or grooming products, we have everything you need to keep your furry friend happy and healthy.</p>
                </div>

                <button class="accordion-btn">4. How do I know if my dog needs professional grooming?</button>
                <div class="accordion-panel">
                    <p>Signs that your dog may need professional grooming include tangled or matted fur, overgrown nails, dirty ears, or a strong odor. Even if your dog appears clean, regular grooming is essential for maintaining their overall health and hygiene. Our expert groomers can assess your dog's grooming needs and recommend appropriate services.</p>
                </div>

                <button class="accordion-btn">5. Do you groom all breeds and sizes of dogs?</button>
                <div class="accordion-panel">
                    <p>Yes, our experienced groomers are skilled in grooming dogs of all breeds, sizes, and temperaments. Whether you have a small toy breed or a large breed dog, we have the expertise and facilities to provide professional grooming services tailored to your dog's individual requirements.</p>
                </div>

                <button class="accordion-btn">6. What should I expect during a grooming appointment?</button>
                <div class="accordion-panel">
                    <p>During a grooming appointment, your dog will receive personalized care and attention from our skilled groomers. Services may include bathing, brushing, nail trimming, ear cleaning, hair trimming, and styling based on your preferences and your dog's needs. We prioritize your dog's comfort and safety throughout the grooming process.</p>
                </div>

                <button class="accordion-btn">7. My dog is nervous about grooming. How do you handle anxious pets?</button>
                <div class="accordion-panel">
                    <p>We understand that some dogs may feel anxious or nervous during grooming. Our compassionate groomers are trained to handle anxious pets with care and patience. We use gentle handling techniques, positive reinforcement, and soothing methods to help alleviate your dog's stress and ensure a positive grooming experience.</p>
                </div>

                <button class="accordion-btn">8. Can I request specific grooming styles or preferences for my dog?</button>
                <div class="accordion-panel">
                    <p>Absolutely! We welcome your input and preferences when it comes to grooming styles for your dog. Whether you prefer a breed-specific haircut, a custom style, or specific grooming instructions, our groomers will work closely with you to achieve the desired look for your furry friend.</p>
                </div>

                <button class="accordion-btn">9. Do you offer grooming packages or discounts for regular customers?</button>
                <div class="accordion-panel">
                    <p>Yes, we offer grooming packages and discounts for our valued customers to help make regular grooming more affordable. Be sure to ask about our loyalty programs and special offers when scheduling your grooming appointments or purchasing pet supplies.</p>
                </div>

                <button class="accordion-btn">10. How can I schedule a grooming appointment or inquire about pet supplies?</button>
                <div class="accordion-panel">
                    <p>Scheduling a grooming appointment or inquiring about pet supplies is easy! You can contact us by phone, email, or visit our pet shop and grooming center in person. Our friendly staff will be happy to assist you with scheduling appointments, answering any questions you may have, and helping you find the perfect pet supplies for your furry friend.</p>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
</section>




        <!-- /.content -->
  <div class="modal fade rounded-0" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header rounded-0">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body rounded-0">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade rounded-0" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-header rounded-0">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body rounded-0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade rounded-0" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header rounded-0">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body rounded-0">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
      </div>
      <!-- /.content-wrapper -->
      <?php require_once('inc/footer.php') ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn74Q8vlhBI0tG7NTolG_3-9vUef2BGFQ"></script>
  <script>
    // Initialize and add the map
    function initMap() {
      // Location coordinates
     
      var myLatLng = {lat: 14.484556177149749, lng: 120.90189640631276}; // Example coordinates (New York)

      // Create a map object and specify the DOM element for display.
      var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 15 // Adjust zoom level as needed
      });

      // Create a marker and set its position.
      var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        title: 'Your Location' // Optional title for the marker
      });

    
    }
  </script>
  <!-- Call the initMap function when the page loads -->
  <script>
    initMap();
  </script>


 <script>

     function showPopup(element) {
        var popup = element.querySelector('.popup');
        popup.style.display = 'block';
    }

    function hidePopup(element) {
        var popup = element.querySelector('.popup');
        popup.style.display = 'none';
    }
     
        function changeBackground(sectionId) {
            var body = document.querySelector('body');
            switch (sectionId) {
                case 'home':
                    body.style.background = 'url(/path/to/home-background.jpg) no-repeat center center fixed';
                    body.style.backgroundSize = 'cover';
                    break;
                case 'services':
                    body.style.backgroundColor = '#000';
                    break;
                case 'location':
                    body.style.background = 'url(/path/to/location-background.jpg) no-repeat center center fixed';
                    body.style.backgroundSize = 'cover';
                    break;
                case 'about':
                    body.style.backgroundColor = '#fff';
                    break;
                default:
                    body.style.background = 'url(/path/to/default-background.jpg) no-repeat center center fixed';
                    body.style.backgroundSize = 'cover';
            }
        }

        // Call changeBackground function for each section
        changeBackground('home'); // Change for default section
        changeBackground('services');
        changeBackground('location');
        changeBackground('about');
    </script>

    <script>
    var acc = document.getElementsByClassName("accordion-btn");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

      function proceedToAdmin() {
        window.location.href = "admin/index.php";
    }
</script>
    

    
  </body>
</html>
