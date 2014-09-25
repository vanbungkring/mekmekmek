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

		<?php 
			endwhile;
			wp_reset_query();  // Restore global post data stomped by the_post().
			else : 		
		?>
			<center><h4>Page Not found</h4></center>
		<?php endif; ?>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>