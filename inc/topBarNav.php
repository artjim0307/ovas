<style>
  .user-img{
        position: absolute;
        height: 17px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }
        .text-sm .layout-navbar-fixed .wrapper .main-header ~ .content-wrapper, .layout-navbar-fixed .wrapper .main-header.text-sm ~ .content-wrapper {
          margin-top: calc(3.6) !important;
          padding-top: calc(3.2em) !important
      }
      #top-Nav {
        background-color: "blue";
}
     </style>

   
<nav class="main-header navbar navbar-expand navbar-light border-0 text-sm fixed-top" id='top-Nav'>
  <div class="container"> <!-- Container to wrap navbar content -->
      <a href="./" class="navbar-brand">
      <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Site Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span><?= $_settings->info('short_name') ?></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        
           <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#location">Location</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="#faqs">FAQS</a>
        </li>
     
     
       
        <li class="nav-item">
          <a class="nav-link" href="admin/login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
      <!-- /.navbar -->
    <script>
  $(document).ready(function(){
    // Function to handle click event on navbar links
    $('nav a.nav-link').click(function(){
      // Get the href value of the clicked link
      var targetSection = $(this).attr('href');

      // Scroll to the corresponding section
      $('html, body').animate({
        scrollTop: $(targetSection).offset().top
      }, 1); // You can adjust the scroll speed (1000ms = 1 second)
    });
  });
</script>