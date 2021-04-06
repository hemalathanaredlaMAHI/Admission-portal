<?php include('header.php'); ?>
    <!-- /. header-section-->
    <!-- page-header -->
     <div class="page-header half-half">
        <div class="half-half__image pageheader-loaded" style="background-image:url(./images/pageheader.jpg);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="page-caption half-half__inner">
                        <h1><span class="page-title">Placement History

</span></h1>
                        <br>
                      <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- /.page-header-->
    <!-- blog-single  -->
    <div class="content">
        <div class="container">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="post-holder">
                        <p class="mb30" align="justify">Placements track record for MSITians has been remarkable and near 100% during the previous years. Our students have been very successful in securing positions at leading organizations in industry and have grown in the career chart at a faster pace. HRs from various companies also have appreciated the skill set the students possess alongside their soft skills. Following is the placement history of recent graduates. </p>
                        
                        <?php include('placement_data.php');?>
                    </div>
                    </div>
                    
					
                </div>
            </div>
        </div>
    </div>
<!-- footer -->
<div class="footer">
   <div class="container">
      <div class="row ">
         <!-- footer-about us -->
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
            <div class="footer-widget ">
               <a href="#"><img src="images/icon_17yrs.png" alt=""  class="mb30"></a>
               <!--<p>Proin eget quam semper, finibus magna ut condiment umes odio. Phasellus in congue nullanec vestibulum quamroin et dolor tctusese desons.</p>-->
               <div class="social-icon mb20 "> <a href="# " class="btn-social-icon "><i class="fa fa-facebook "></i></a> <a href="# " class="btn-social-icon "><i class="fa fa-twitter "></i></a> <a href="# " class="btn-social-icon "><i class="fa fa-linkedin "></i></a> <a href="# " class="btn-social-icon "><i class="fa fa-google-plus "></i></a><a href="# " class="btn-social-icon "><i class="fa fa-instagram "></i></a> </div>
            </div>
         </div>
         <!-- /.footer-about us -->
         <!-- footer-quick-links -->
         <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 ">
            <div class="footer-widget ">
               <h3 class="footer-title "> Quick Links </h3>
               <ul class="list-none">
                  <li><a href="terms.php ">Terms & Conditions</a></li>
                  <li><a href="privacy.php">Privacy Policy</a></li>
                  <li><a href="refund.php"> Refund / Cancellation </a></li>
                  <!--<li><a href="# ">Image Gallery</a></li>
                     <li><a href="# ">Admissions</a></li>
                     <li><a href="# ">Contact us</a></li>
                     <li><a href="# ">Terms & Conditions </a></li>
                     <li><a href="# ">Privacy Policy</a></li>
                     <li><a href="# ">Refund / Cancellation Policy</a></li>-->
               </ul>
            </div>
         </div>
         <!-- /.footer-quick-links -->
         <!-- footer-service -->
         <!--<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 ">
            <div class="footer-widget ">
                <h3 class="footer-title ">MSIT Edge</h3>
                <ul class="list-none">                        
                    <li><a href="#">Learning By Doing</a></li>
                    <li><a href="#">Project Centric Curriculum</a></li>
                    <li><a href="#">Soft Skills</a></li>
                    <li><a href="#">Infrastructure</a></li>
                    <li><a href="#">Specializations</a></li>
                </ul>
            </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 ">
            <div class="footer-widget ">
                <h3 class="footer-title ">MSIT Edge</h3>
                <ul class="list-none">                        
                    <li><a href="#">Learning By Doing</a></li>
                    <li><a href="#">Project Centric Curriculum</a></li>
                    <li><a href="#">Soft Skills</a></li>
                    <li><a href="#">Infrastructure</a></li>
                    <li><a href="#">Specializations</a></li>
                </ul>
            </div>
            </div>-->
         <!-- /.footer-service -->
         <!-- footer-newsletter -->
         <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
            <div class="footer-widget ft-newsletter">
                <h3 class="footer-title">Receive Our Emails</h3>
                <p>Get our news delivered directly to your inbox.</p>
                <form>
                    <div class="newsletter-form">
                        <input class="form-control" placeholder="Enter Your Email address" type="text">
                        <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            </div>-->
         <!-- /.footer-newsletter -->
      </div>
      <!-- tiny-footer -->
   </div>
   <div class="tiny-footer ">
      <div class="container ">
         <div class="row ">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
               <p>Consortium of Institutions of Higher Learning, IIIT Campus, Gachibowli, Hyderabad - 500032
                  Phone: <?php echo PHONETEXT ?> Mobile: <?php echo MOBILETEXT ?> E-mail: <?php echo EMAILTEXT ?>
               </p>
            </div>
         </div>
         <!-- /. tiny-footer -->
      </div>
   </div>
</div>
<!-- /.footer -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <form>
               <div class="search-form">
                  <input type="text" class="form-control" placeholder="Find here">
                  <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">close</span>
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /.Modal -->
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="js/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/menumaker.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/sticky-header.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/multiple-carousel.js"></script>
<script src="js/return-to-top.js"></script>
</body>
</html>