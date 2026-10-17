<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HAL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="text.css">
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="animation.css">
  <link rel="stylesheet" href="nav.css">
</head>

<body>

  <!-- ==========================
         LOADING SCREEN
         ========================== -->

  <!-- Full-screen loader displayed while the webpage loads -->
  <div id="loader">

    <!-- INDIA logo shown in the loading animation -->
    <img src="Flag_of_India.svg.jpg" alt="BHARAT">

  </div>

  <!-- ==========================
         JAVASCRIPT
         ========================== -->

  <script>

    // Wait until every resource of the webpage
    // (images, CSS, videos, etc.) has finished loading.
    window.addEventListener("load", () => {

      // Creates a delay before hiding the loader.
      setTimeout(() => {

        // Adds the "hide" class to the loader.
        // The CSS attached to this class fades
        // the loader out smoothly.
        document.getElementById("loader").classList.add("hide");

      }, 1500);     // Delay of 1500 milliseconds (1.5 seconds)

    });

  </script>

  <video autoplay muted loop playsinline id="bg-video">
    <source src="PinGrab_1785703235972.mp4" type="video/mp4">
  </video>

  <br><br><br><br>
  <!-- NAV -->
  <nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">

      <!-- Logo -->
      <a class="navbar-brand" href="#">
        <img src="images.jpe" width="60" alt="HAL Logo">
      </a>

      <!-- Mobile Button -->
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigation -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">

        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">What we do</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Our Organisation</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Inventory</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Achievements</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">News</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Opportunities
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Jobs</a></li>
              <li><a class="dropdown-item" href="#">Internships</a></li>
              <li><a class="dropdown-item" href="#">Recruitment</a></li>
            </ul>

          </li>

        </ul>

      </div>

    </div>
  </nav>

 

  <!-- FOOTER -->
  <footer>
   <br><br><br>

    <!-- <p>&copy; 2026 My Website Name. All rights reserved.</p>
    <p><a href="mailto:info@example.com">Contact Us</a></p>
    <img src="damon.png" alt="" width="50px"> -->

    <div style="display: flex; gap:200px">
      <div style="display: flex; flex-direction:column">
        <a href="" style="color: white;">
          <p><strong>Utilities</strong></p>
        </a>
        <a href="">
          <p>NEWS</p>
        </a>
        <a href="">
          <p>Right To Information</p>
        </a>
        <a href="">
          <p>Miscellaneous</p>
        </a>
        <a href="">
          <p>PoSH</p>
        </a>
        <a href="">
          <p>Tender</p>
        </a>
        <a href="">
          <p>Career</p>
        </a>
        <a href="">
          <p>language Translator</p>
        </a>
        <a href="">
          <p>Investors</p>
        </a>
        <a href="">
          <p>FAQ</p>
        </a>
        <a href="">HAL Logo<br><br><br></a>
      </div>
      <div style="display: flex; flex-direction:column">
        <a href="" style="color: white;">
          <p><strong>Category</strong></p>
        </a>
        <a href="">
          <p>Product</p>
        </a>
        <a href="">
          <p>Civil Product</p>
        </a>
        <a href="">
          <p>ITSO Product</p>
        </a>
        <a href="">
          <p>Power Plant</p>
        </a>
        <a href="">
          <p>HAL's Test Facility</p>
        </a>

      </div>
      <div style="display: flex; flex-direction:column">
        <a href="" style="color: white;">
          <p><strong>Follow HAL</strong></p>
        </a>
        <a href="">
          <p>Leadership</p>
        </a>
        <a href="">
          <p>Production Unit</p>
        </a>
        <a href="">
          <p>R&D Centers</p>
        </a>
        <a href="">
          <p>Our History</p>
        </a>
        <a href="">
          <p>Glimpse of Traversed Path</p>
        </a>
      </div>
      <div style="display: flex; flex-direction:column">
        <a href="" style="color: white;">
          <p><strong>Connect</strong></p>
        </a>
        <a href="">
          <p>Connect Us</p>
        </a>
        <a href="">
          <p>Feedback</p>
        </a>
        <a href="">
          <p>Rate Your Experience</p>
        </a>
        <a href="">
          <p>Social Connect</p>
        </a>
        <a href="">
          <p>Web Manager</p>
        </a>
      </div>
      <div style="display: flex; flex-direction:column">
        <a href="" style="color: white;">
          <p><strong>Website Specific</strong></p>
        </a>
        <a href="">
          <p>Website Policy</p>
        </a>
        <a href="">
          <p>Accessibility Help</p>
        </a>
        <a href="">
          <p>Disclaimer</p>
        </a>
        <a href="">
          <p>Sidemap</p>
        </a>
        <a href="">
          <p>STQC Certificate</p>
        </a>

      </div>


    </div>
    <p>&copy; 2026 My Website Name. All rights reserved.</p>
    <p><a href="mailto:info@example.com">Contact Us</a></p>
    <img src="damon.png" alt="" width="50px">

    <!-- MODAL -->
    <!-- Button trigger modal -->
    <button style="background-color: rgba(0, 48, 95); display:flex; justify-content:center; align-content:center" type="button"
      class="btn btn-primary  " data-bs-toggle="modal" data-bs-target="#exampleModal">
      Cookies
    </button><br><br><br>

    <!-- Modal -->
    <div class="modal fade autoShow" style="background-color: rgba(0, 48, 95, 0.362);" id="exampleModal" tabindex="-1"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="background-color: rgba(0,47,95,0.23);">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Allow Cookies</h1>
            <button style="background-color: rgba(0, 48, 95);" type="button" class="btn-close" data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Helps us in providing the better user experience
          </div>
          <div class="modal-footer">
            <button type="button" style="background-color: rgba(0, 48, 95);" class="btn btn-secondary"
              data-bs-dismiss="modal">Accept all</button>
            <button type="button" style="background-color: rgb(255, 255, 255);  color:black "
              class="btn btn-primary">Only
              Neccessary</button>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

  <script src="animation.js"></script>
</body>

</html>