<?php 
ob_start();
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Refrigeraci&oacute;n</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto:400,500&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="#">
          <div class="logo_box">
            <img src="images/snow.png" alt="" />
            <h2 class="ma">CLISER</h2>
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-2">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Acerca de nosotros </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="service.php">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contactanos</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control nav_search-input mr-sm-2 d-none" type="search" placeholder="Search"
              aria-label="Search" value="" />
            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
          </form>
        </div>
        <div class="container-user">
          <i class="fa-solid fa-user"><a href="login.php">Admin</a></i>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->



  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class=" contact_form-container">
          <div class="contact_box">
            <h2 class="tite">Complete el siguiente formulario con sus datos</h2>
            <form action="" method="POST">
              <input type="text" placeholder="Nombre" name="name" required>
              <input type="text" placeholder="Apellido" name="lastname" required>
              <input type="text" placeholder="Correo electrónico" name="email" required>
              <input type="text" placeholder="Número telefónico" name="phonenumber" required>
              <input type="text" placeholder="Problema que presentas" name="issue" required>
              <br>
              <select name="service">
                <option disabled>Selecione el servicio que necesita</option>
                <option value="Reparacion">Reparación</option>
                <option value="Ventas">Ventas</option>
                <option value="Asesoria">Asesoría</option>
                <option value="Mantenimiento">Mantenimiento</option>
              </select>
              <div>
                <button type="submit" name="create-issue">
                  Enviar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
    </div>
  </section>
  <?php 
  
    $con = mysqli_connect("localhost", "root", "", "refrigeracion");

    $response = array();

    if(isset($_POST["create-issue"])){
      $name = $_POST['name'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $phonenumber = $_POST['phonenumber'];
      $issue = $_POST['issue'];
      $service = $_POST['service'];

        if($con){
          $query = "insert into cases(id_case, name_issuer, lastname_issuer, email_issuer, phone_issuer, issue, service) values (id_case,'{$name}', '{$lastname}', '{$email}', '{$phonenumber}', '{$issue}', '{$service}');";
          $result = mysqli_query($con, $query);

          if($result){
              // echo "Registrado con exito"."<br />";
              header('location:./responses/solicitud_exito.php');
          }
      }else{
          echo "Database connection failed";
      }
    }
  
  ?>
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class=" col-md-4 info_detail">
          <div>
            <p>
              Para cualquier duda o necesidad correspondiente a nuestros servicios
              se puede contactar con nosotros por las siguientes vías:

            </p>
          </div>
        </div>
        <div class=" col-md-4 address_container">
          <div>
            <h3>
              Contacto:
            </h3>
            <div class="address_link-container">
              <a href="">
                <img src="images/location.png" alt="">
                <span> Dirección: Av. Tiradentes 22, Santo Domingo, Distrito Nacional, RD
                </span>
              </a>
              <a href="">
                <img src="images/phone.png" alt="">
                <span> Tel: +1 809 564 1576
                </span>
              </a>
              <a href="">
                <img src="images/phone.png" alt="">
                <span>
                  Tel: +1 809 448 1688
                </span>
                <a href="">
                  <img src="images/mail.png" alt="">
                  <span>
                    Email: jborrome@hotmail.es
                  </span>
              </a>
            </div>
          </div>
        </div>
        <div class=" col-md-4 news_container">
          <div>
            <div>
              <h3>
                Subcripción

              </h3>
              <form action="">
                <input type="email" placeholder="Ingrese su correo">
                <div>
                  <button type="submit">
                    Subscribirse
                  </button>
                </div>
              </form>
            </div>
            <div class="social_container">
              <div>
                <img src="images/fb.png" alt="">
              </div>
              <div>
                <img src="images/twitter.png" alt="">
              </div>
              <div>
                <img src="images/linkedin.png" alt="">
              </div>
              <div>
                <img src="images/youtube.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->
  <script
  src="https://kit.fontawesome.com/81581fb069.js"
  crossorigin="anonymous"
></script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
  </script>

  <script>
    $(".nav_search-btn").click(function () {
      if ($(".nav_search-input").hasClass("d-none")) {
        event.preventDefault();
        $(".nav_search-input")
          .animate({
              left: "-1000px"
            },
            "1000000"
          )
          .removeClass("d-none");
      } else {
        $(".nav_search-input")
          .animate({
              left: "0px"
            },
            "1000000"
          )
          .addClass("d-none");
      }
    });
  </script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 18.5833300,
          lng: -72.2666700
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 18.5833300,
          lng: -72.2666700
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->

</body>

</html>