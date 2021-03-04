<?php

/**This function belongs to Khollinzx
 *  To run this application insert the entire folder into xampp/htdoc
 */

/**
 * This imports the RechargeCardPin Class
 */
require_once("../classes/RechargeCardPin.php");

/**
 * initializing the instance
 */
$airtime = new RechargeCardPin();
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
                    <h3 class="nav-tabs-title text-center">Task 1 Week 1</h3>
                    <h6>Recharge Card Generator</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div>
                    <?php $airtime->createCards(1, 200); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');
?>