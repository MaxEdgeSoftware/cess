<?php
session_start();
if(!isset($_SESSION['adminUserName'])){
  header("location:login.php");
}else{
// include('api/fetchAPI.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-danger">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <!-- <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a> -->
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
            
                    <li>
                        <a id='registration' href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Registrations</span></a>
                    </li>
                    <li>
                        <a id='contact' href='#' class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Contacts</span> </a>
                    </li>
                    <li>
                        <a id='team' href='#' class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Trainers</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"> -->
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['adminUserName']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="logOut.php">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            <!-- ======= Why Us Section ======= -->
 <section id="why-us" class="why-us">
      <div class="container-fluid">

        <div class="row">
<!-- add trainer  Modal -->
<div class="modal fade" id="addTrainer" tabindex="-1" role="dialog" aria-labelledby="addTrainerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTrainerLabel">Add Trainer</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id='trainerForm' method='POST' enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
    <div class="form-group col-md-6">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" name='title' placeholder="title">
    </div>
  </div>
  <div class="form-group">
    <label for="about">about</label>
    <input type="text" class="form-control" id="about" name='about' placeholder="about">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="twitter">twitter</label>
      <input type="text" class="form-control" id="twitter" name='twitter'>
    </div>
    <div class="form-group col-md-6">
      <label for="facebook">facebook</label>
      <input type="text" class="form-control" id="facebook" name='facebook'>
    </div>
    <div class="form-group col-md-6">
      <label for="instagram">instagram</label>
      <input type="text" class="form-control" id="instagram" name='instagram'>
    </div>
    <div class="form-group col-md-6">
      <label for="linkedin">linkedin</label>
      <input type="text" class="form-control" id="linkedin" name='linkedin'>
    </div>
    <div class="form-group col-md-6">
      <label for="image">image</label>
      <input type="file" class="form-control" id="image" name='image' onchange="loadFile(event)">
    </div>
    <img id="output" width='100' height='100'/>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id='submitTrainer' type="button" class="btn btn-primary">save</button>
      </div>
    </div>
  </div>
</div> <!-- end of add trainer modal   -->

<!-- edit trainer  Modal -->
<div class="modal fade" id="editTrainer" tabindex="-1" role="dialog" aria-labelledby="editTrainerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id='trainerFormEdit' method='POST' enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="editTrainerLabel">Edit Trainer</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">name</label>
      <input id='editName' type="text" class="form-control" name="nameEdit" placeholder="Name">
    </div>
    <div class="form-group col-md-6">
      <label for="title">title</label>
      <input id='editTitle' type="text" class="form-control" name='titleEdit' placeholder="title">
    </div>
  </div>
  <div class="form-group">
    <label for="about">about</label>
    <input id='editAbout' type="text" class="form-control"  name='aboutEdit' placeholder="about">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="twitter">twitter</label>
      <input id='editTwitter' type="text" class="form-control" name='twitterEdit'>
    </div>
    <div class="form-group col-md-6">
      <label for="facebook">facebook</label>
      <input id='editFacebook' type="text" class="form-control" name='facebookEdit'>
    </div>
    <div class="form-group col-md-6">
      <label for="instagram">instagram</label>
      <input id='editInstagram' type="text" class="form-control" name='instagramEdit'>
    </div>
    <div class="form-group col-md-6">
      <label for="linkedin">linkedin</label>
      <input id='editLinkedin' type="text" class="form-control" name='linkedinEdit'>
    </div>
    <div class="form-group col-md-6">
      <label for="image">image</label>
      <input id='editImage' type="file" class="form-control" name='imageEdit' onchange="loadFile(event)">
    </div>
    <img id="outputEdit" width='100' height='100'/>
  </div>
  <input id='editId' type="hidden" class="form-control" name='id'>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id='submitTrainerEdit' name='submit' type="submit" class="btn btn-primary">save</button>
      </div>
    </div>
    </form>
  </div>
</div> <!-- end of edit trainer modal   -->


          <!-- <div class="col-lg-5 align-items-stretch position-relative video-box" style='background-image: url("assets/img/why-us.jpg");' data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div> -->

          <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">
            <div id='successMessage'></div>
            <div class="content">
              <h3><strong>Dashboard </strong></h3>
              <p>Here you manage your website...</p>
              
            </div>

            <div class="accordion-list">
              <ul id='displayInfo'>
        
              </ul>
             
            </div>

          </div>

        </div>
      </div>

    </section><!-- End Why Us Section --> 
        </div>
    </div>
   
</div>
 <!-- Vendor JS Files -->
 <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/formSubmit.js"></script>
  <script src="assets/js/contactAJAX.js"></script>
  <script src="assets/js/registrationAJAX.js"></script>
  <script src="assets/js/trainersAJAX.js"></script>
  <script src="assets/js/submitTrainerForm.js"></script>
  <script src="assets/js/editTrainerForm.js"></script>
  <script src="assets/js/deleteTrainer.js"></script>
  <script src="assets/js/deleteContact.js"></script>
  <script src="assets/js/deleteRegistration.js"></script>



  <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    var outputEdit = document.getElementById('outputEdit');

    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  
    outputEdit.src = URL.createObjectURL(event.target.files[0]);
    outputEdit.onload = function() {
      URL.revokeObjectURL(outputEdit.src)
    }
}
</script>

</body>
</html>

<?php
}
?>