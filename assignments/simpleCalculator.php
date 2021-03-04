<?php
require_once('../classes/CalculatorActions.php');

$getAnswer = new CalculatorActions();

$answer = 0;
$value1 = 0;
$value2 = 0;

if (isset($_POST['submit'])) {
    extract($_POST);

    $answer = $getAnswer->performCalculation($value1, $value2, $symbol);
}
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
                    <h3 class="nav-tabs-title text-center">Task 2 Week 1</h3>
                    <h6>Simple Calculator</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div>
                    <form method="POST">
                        <table class="table">
                            <tbody>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <input type="number" name="value1" value="<?php echo $value1; ?>" placeholder="Enter an Integer Value" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <input type="number" name="value2" value="<?php echo $value2; ?>" placeholder="Enter an Integer Value" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <h3>Pick an Operator</h3>
                                <tr>
                                    <td>
                                        <div>
                                            <input type="radio" name="symbol" value="+" required> + (Addition)
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="radio" name="symbol" value="-" required> - (Subtraction)
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="radio" name="symbol" value="/" required> / (Division)
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="radio" name="symbol" value="*" required> * (Multiplication)
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group">
                                    <h4 class=""> Answer: <?php echo $answer ?> </h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-primary pull-right">= (Answer)<div class="ripple-container"></div></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');
?>