<?php
include_once('library/Helper.php');
include('public/template/head.php');
?>
<!-- Start Main Wrapper -->
<div class="wrapper">
	<!-- Start Main Header -->
	<!-- Start Top Nav Bar -->
	<?php
	include('public/template/top_nav_bar.php');
	?>
	<!-- End Top Nav Bar -->
    <?php
	include('public/template/main_header.php');
	?>
	<!-- End Main Header -->
    <!-- Start Main Content Holder -->
	<?php
	include('public/template/content_holder.php');
	?>
	<!-- End Main Content Holder -->
    <!-- Start Footer Top 1 -->
	<?php
	include('public/template/footer_top_1.php');
	?>
	<!-- End Footer Top 1 -->
    <!-- Start Footer Top 2 -->
  	<?php
	include('public/template/footer_top_2.php');
	?>
  	<!-- End Footer Top 2 -->
</div>
<!-- End Main Wrapper -->
<!-- JS Files Start -->
<script type="text/javascript" src="public/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="public/js/numeral.js"></script>
<script type="text/javascript" src="public/js/sweetalert2.common.js"></script>

<script type="text/javascript" src="public/js/discount_percent.js"></script>
<script type="text/javascript" src="public/js/is_logged.js"></script>
<script type="text/javascript" src="public/js/ajax_post_review.js"></script>
<script type="text/javascript" src="public/js/quantity_spinner.js"></script>
<script type="text/javascript" src="public/js/ajax_cart.js"></script>

<script type="text/javascript" src="public/js/lib.js"></script><!-- lib Js -->
<script type="text/javascript" src="public/js/modernizr.js"></script><!-- Modernizr -->
<script type="text/javascript" src="public/js/easing.js"></script><!-- Easing js -->
<script type="text/javascript" src="public/js/bs.js"></script><!-- Bootstrap -->
<script type="text/javascript" src="public/js/bxslider.js"></script><!-- BX Slider -->
<script type="text/javascript" src="public/js/input-clear.js"></script><!-- Input Clear -->
<script src="public/js/range-slider.js"></script><!-- Range Slider -->
<script src="public/js/jquery.zoom.js"></script><!-- Zoom Effect -->
<script type="text/javascript" src="public/js/bookblock.js"></script><!-- Flip Slider -->
<script type="text/javascript" src="public/js/custom.js"></script><!-- Custom js -->
<script type="text/javascript" src="public/js/social.js"></script><!-- Social Icons -->
<!-- JS Files End -->
<noscript>
<style>
	#socialicons>a span { top: 0px; left: -100%; -webkit-transition: all 0.3s ease; -moz-transition: all 0.3s ease-in-out; -o-transition: all 0.3s ease-in-out; -ms-transition: all 0.3s ease-in-out; transition: all 0.3s 	ease-in-out;}
	#socialicons>ahover div{left: 0px;}
	</style>
</noscript>
<script type="text/javascript">
  /* <![CDATA[ */
  $(document).ready(function() {
  $('.social_active').hoverdir( {} );
})
/* ]]> */
</script>
</body>
</html>