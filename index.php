<?php

require_once('classes/header.php');

$answer = 0;
$value1 = 0;
$value2 = 0;

if (isset($_POST['submit'])) {
  extract($_POST);

  $answer = $getAnswer->performCalculation($value1, $value2, $symbol);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body class="">
  <div class="wrapper ">

    <div class="main-panel">
      <!-- Navbar -->
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-lg-offset-6">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs- ">
                      <h3 class="nav-tabs-title text-center">Quiz Week 2</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div>
                      <form method="POST">
                        <form>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">First Name</label>
                              <input type="text" name="first_name" class="form-control" id="first_name" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Last Name</label>
                              <input type="text" name="last_name" class="form-control" id="last_name" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                          </div>
                          <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">City</label>
                              <input type="text" class="form-control" name="city" id="city" required>
                            </div>
                            <div class="col-md-6">
                              <button id="submit" class="btn btn-primary pull-right"> Submit<div class="ripple-container"></div></button>
                            </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="card1" class="col-lg-6 col-md-12 col-lg-offset-6">
              <div class="card">
                <div class="card-body">
                  <div class="tab-content">
                    <h4>First Name</h4>
                    <p id="d_first_name"></p>
                    <br>
                    <h4>Last Name</h4>
                    <p id="d_last_name"></p>
                    <br>
                    <h4>Email</h4>
                    <p id="d_email"></p>
                    <br>
                    <h4>Address </h4>
                    <p id="d_address"></p>
                    <br>
                    <h4>City</h4>
                    <p id="d_city"></p>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#card1").hide();

      $("#submit").click(function(e) {

        e.preventDefault();
        submitForm();

        function submitForm() {
          var data = $("form").serialize();
          $.ajax({
            type: 'POST',
            url: 'function/controller.php',
            data: data,
            dataType: 'json',
            beforeSend: function() {
              $("#submit").html('Validating...');
              $("#submit").attr("disabled", true);
            }
          }).done(function(response) {

            $("#card1").show();
            $("#submit").attr("disabled", false);
            $("#submit").html('Submit');
            displayDetails(response.data);

          }); // ends create ajax 
        }

      });

      function displayDetails(data) {
        $("#d_first_name").html(data.firstName);
        $("#d_last_name").html(data.lastName);
        $("#d_email").html(data.email);
        $("#d_address").html(data.address);
        $("#d_city").html(data.city);
      }

    });
  </script>

</body>

</html>