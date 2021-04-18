<?php

include ('admin/class//adminBack.php');
$obj = new adminBack();
$ctg = $obj->p_display_category();
$ctgData =array();
while ($data = mysqli_fetch_assoc()) {
    # code...
}
?>
<?php
include_once("includes/head.php");
?>

<body class="biolife-body">

<?php
include_once("includes/preload.php");
?>

    <!-- HEADER -->
<header id="header" class="header-area style-01 layout-03">
<?php include_once("includes/header.php");?>
<?php include_once("includes/header-second.php");?>
<?php include_once("includes/header-third.php");?>     
</header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Main Slide-->
          <?php include_once("includes/slider.php");?>

            <!--Block 02: Banners-->
                <?php include_once("includes/banner.php");?>
            <!--Block 03: Product Tabs-->
            <?php include_once("includes/home-slider-product.php");?>
     
   

            <!--Block 06: Products-->
            <div class="Product-box sm-margin-top-96px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <?php include_once("includes/deals.php");?>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6">
                           <?php include_once("includes/top-rate.php");?>
                </div>
            </div>
 </div>
            <!--Block 07: Brands-->
          <?php  include_once("includes/brand.php");?>

        </div>
    </div>

    <!-- FOOTER -->
    <?php include_once("includes/footer.php");?>

    <!--Footer For Mobile-->
     <?php include_once("includes/mobile-footer.php");?>
     <?php include_once("includes/mobile-gol.php");?>
    
    

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php include_once("includes/script.php");?>
</body>

</html>