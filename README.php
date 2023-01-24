<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?> <!DOCTYPE html><html lang="en"><head><title>Laptop and Desktop Rental Management System || Home Page</title><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><link rel="stylesheet" href="css/owl.carousel.css"><link rel="stylesheet" href="style.css"><link rel="stylesheet" href="css/responsive.css"></head><body> <?php include_once('includes/header.php');?> <div class="slider-area"><div class="zigzag-bottom"></div><div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel"><div class="slide-bulletz"><div class="container"><div class="row"><div class="col-md-12"><ol class="carousel-indicators slide-indicators"><li data-target="#slide-list" data-slide-to="0" class="active"></li><li data-target="#slide-list" data-slide-to="1"></li></ol></div></div></div></div><div class="carousel-inner" role="listbox"><div class="item active"><div class="single-slide"><div class="slide-bg slide-one"></div><div class="slide-text-wrapper"></div></div></div><div class="item"><div class="single-slide"><div class="slide-bg slide-two"></div><div class="slide-text-wrapper"></div></div></div></div></div></div><div class="promo-area"><div class="zigzag-bottom"></div><div class="container"><div class="row"><div class="col-md-3 col-sm-6"><div class="single-promo"><i class="fa fa-refresh"></i><p>30 Days return</p></div></div><div class="col-md-3 col-sm-6"><div class="single-promo"><i class="fa fa-truck"></i><p>Free shipping</p></div></div><div class="col-md-3 col-sm-6"><div class="single-promo"><i class="fa fa-lock"></i><p>Secure payments</p></div></div><div class="col-md-3 col-sm-6"><div class="single-promo"><i class="fa fa-gift"></i><p>New products</p></div></div></div></div></div><div class="maincontent-area"><div class="zigzag-bottom"></div><div class="container"><div class="row"><div class="col-md-12"><div class="latest-product"><h2 class="section-title">Latest Products</h2><div class="product-carousel"> <?php

//Getting default page number
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM tblproduct";
        $ret1=mysqli_query($con,"select COUNT(*) from  tblproduct");
$total_rows = mysqli_fetch_array($ret1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);                                                   
 $query=mysqli_query($con,"select * from tblproduct LIMIT $offset, $no_of_records_per_page");
 while ($row=mysqli_fetch_array($query)) {


 ?> <div class="single-product"><div class="product-f-image"><img src="admin/images/<?php echo $row['Image'];?>" width="400" height="200" style="border:solid 1px #000"><div class="product-hover"><a href="single-product-details.php?viewid=<?php echo $row['ID'];?>" class="view-details-link"><i class="fa fa-link"></i>See details</a></div></div><h2><a href="single-product-details.php?viewid=<?php echo $row['ID'];?>"><?php echo $row['ProductName'];?></a></h2><div class="product-carousel-price"><ins>$<?php echo $row['RentalPrice'];?>/day</div></div><?php } ?> </div></div></div></div></div></div><div class="brands-area"><div class="zigzag-bottom"></div><div class="container"><div class="row"><div class="col-md-12"><div class="brand-wrapper"><h2 class="section-title">Brands</h2><div class="brand-list"> <?php

                                                   
 $query=mysqli_query($con,"select * from tblbrand");
 while ($row=mysqli_fetch_array($query)) {
 ?> <img src="admin/images/<?php echo $row['BrandLogo'];?>" alt="" height="200" width="200"><?php }?> </div></div></div></div></div></div> <?php include_once('includes/footer.php');?> <script src="https://code.jquery.com/jquery.min.js"></script><script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script><script src="js/owl.carousel.min.js"></script><script src="js/jquery.sticky.js"></script><script src="js/jquery.easing.1.3.min.js"></script><script src="js/main.js"></script></body></html>
