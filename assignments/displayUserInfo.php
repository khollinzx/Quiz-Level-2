<?php
include('../includes/header2.php');
?>

<div class="col-lg-6 col-md-12 col-lg-offset-6">
    <a href="../index.php" class="btn btn-primary pull-right"> Back</a>
    <br>
    <br>
    <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs- ">
                    <h3 class="nav-tabs-title text-center">Quiz 1 Week 2</h3>
                    <h6>Display User Inputted Details</h6>
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
                    url: '../function/controller.php',
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

<?php
include('../includes/footer.php');
?>