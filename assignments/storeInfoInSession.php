<?php
session_start();

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
                    <h3 class="nav-tabs-title text-center">Task 2 Week 2</h3>
                    <h6>Store User Information in SESSION OR COOKIES</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <button id="submit" class="btn btn-primary pull-right"> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_SESSION["email"])) {
?>
    <div id="card1" class="col-lg-6 col-md-12 col-lg-offset-6">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <h4>Your Logged in As:</h4>
                    <span><?php echo $_SESSION["email"]; ?></span>
                    <br>
                    <p>Password: <span><?php echo $_SESSION["password"]; ?></span></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $(document).ready(function() {

        $("#submit").click(function(e) {

            e.preventDefault();
            submitForm();

            function submitForm() {
                var data = $("form").serialize();
                $.ajax({
                    type: 'POST',
                    url: '../function/sessionController.php',
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        $("#submit").html('Validating...');
                        $("#submit").attr("disabled", true);
                    }
                }).done(function(response) {
                    if (response === 'okay') {
                        $("#submit").html('Submit');
                        $("#submit").attr("disabled", false);
                        window.location.href = "storeInfoInSession.php"
                    }
                }); // ends create ajax 
            }

        });

    });
</script>

<?php
include('../includes/footer.php');
?>