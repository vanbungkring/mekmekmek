<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>3M Mining Partner | Contact Us For More Info</title>
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta name="title" content="3M Mining Partner | Contact Us For More Info" />
	<meta name="description" content="See the detail contact for visitors, get connected with 3M mining representative, find out more about our safety equipments and mining products" />

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
			<h2 class="content-title col-md-12">CONTACT</h2>
		</section>
	</div>
	<div class="content container">
		<div class="row">
		<?php if(have_posts()) : while(have_posts()) : the_post();?>
		<section class="contact-box col-md-5">
			<h2 class="contact-title">3M Indonesia</h2>
			<p><?php echo nl2br(get_post_meta(get_the_ID(), 'contact_address', true)); ?></p>
			<p>
				Phone: <?php echo get_post_meta(get_the_ID(), 'contact_phone', true); ?><br>
				Fax : <?php echo get_post_meta(get_the_ID(), 'contact_fax', true); ?><br>
				MOBILE : <?php echo get_post_meta(get_the_ID(), 'contact_mobile', true); ?>
			</p>
			<p>
				<?php echo get_post_meta(get_the_ID(), 'contact_day_open', true); ?><br>
				<?php echo get_post_meta(get_the_ID(), 'contact_hour_open', true); ?>
			</p>
		</section>
		<section class="contact-box-form col-md-7">
			<h2 class="contact-title">Quick contact</h2>
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