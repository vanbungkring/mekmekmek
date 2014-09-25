<?php if ( ! is_user_logged_in() ) { wp_redirect( home_url().'/benefit' ); exit; } ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<title>	<?php wp_title( '|', true, 'right' ); bloginfo( 'name' );?> </title>
	
	<?php wp_head();?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-49441522-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<?php get_header(); ?>
	<div class="content container">
		<section class="row">
			<h2 class="content-title col-md-12">Training</h2>
		</section>
	</div>
	<div class="content container">
		<div class="row">
		<?php if(have_posts()) : while(have_posts()) : the_post();?>
		<section class="contact-box-form col-md-7">
			<h2 class="contact-title">Training Form</h2>
			<?php the_content('');?>
		</section>
			<center><h4>Page Not found</h4></center>
		<?php endif; ?>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>