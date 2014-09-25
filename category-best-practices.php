<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>3M Mining Partner | Tips, Best Practice And Recommendation For Miner</title>
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta name="title" content="3M Mining Partner | Tips, Best Practice And Recommendation For Miner" />
	<meta name="description" content="Read all tips about safety working environment, best practices of mining industry, and case study for miners about mining products" />
	<meta name="keywords" content="Mining tips" />
	<?php wp_head();?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php get_header(); ?>
	<div class="content best container">
		<div class="row">
			<section class="featured-news col-md-7">
				<div class="row">
					<h2 class="content-title category col-md-12">
						BEST PRACTICE
						<span>
							<?php posts_nav_link(' ','&#9664;','&#9654;'); ?>
						</span>
					</h2>
				</div>
				<?php if(have_posts()) : while(have_posts()) : the_post();?>
					<div class="row">
						<div class="article col-md-12">
							<div class="row">
								<div class="article-content col-md-8">
									<a class="article-title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
										<h3><?php the_title();?></h3>
									</a>
									<?php the_content('');?>
								</div>
								<div class="col-md-4">
									<?php
										// check if the post has a Post Thumbnail assigned to it.
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('thumbnail');
										} 
									?>
								</div>
							</div>
							<div class="row">
								<div class="article-footer col-md-12">
									Page Views&nbsp;<i class="fa fa-eye"></i>&nbsp;<?php echo getPostViews(get_the_ID()); ?> &nbsp;&nbsp;
									<?php comments_number( 'no responses', 'Comment&nbsp;<i class="fa fa-comment"></i>&nbsp;1', 'Comments&nbsp;<i class="fa fa-comment"></i>&nbsp; % ' ); ?>
								</div>
							</div>
						</div>
					</div>
				<?php 
					endwhile;
					wp_reset_query();  // Restore global post data stomped by the_post().
					else : 		
				?>
					<center><h4>Not found</h4></center>
				<?php endif; ?>
				
			</section>
			<section class="recent-comment col-md-5">
				<ul class="tabs solution-tab row">
					<li class="col-md-4"><a href="#popular">POPULAR</a></li>
					<li class="col-md-4"><a href="#comments">COMMENTS</a></li>
					<li class="col-md-4"><a href="#recents">RECENTS</a></li>
				</ul>
				<div class="tab_container row">
					<div id="popular" class="tab_content col-md-12">
						<ul class="row">
						<?php $args=array('category_name' => 'best-practices','showposts'=> 5, 'meta_key' => 'post_views_count','orderby'=>'meta_value_num','order'=>'DESC'); ?>
						<?php query_posts($args); ?>
						<?php if(have_posts()) : while(have_posts()) : the_post();?>
						<?php $the_ID = get_the_ID(); ?>
							<li class="col-md-12">
								<h5>
									<a href="<?php the_permalink() ?>">
										<?php the_title();?>
									</a>
								</h5>
								<span><?php the_date('d/m/Y'); ?> by <?php echo get_the_author() ?></span>
								<p><?php the_content('');?></p>
						 	</li>
						<?php 
							endwhile;
							wp_reset_query();  // Restore global post data stomped by the_post().
							endif; 		
						?>
						</ul>
					</div>
					<div id="comments" class="tab_content col-md-12">
						<?php
							$number=5; // number of recent comments desired
							$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
						?>
						<ul class="row">
						<?php
							if ( $comments ) : foreach ( (array) $comments as $comment) :
						?>
							<li class="col-md-12">
								<h5>
									<a href="<?php echo get_comment_link($comment->comment_ID) ?>">
										<?php echo get_the_title($comment->comment_post_ID) ?>
									</a>
								</h5>
								<span><?php echo date('d/m/Y',strtotime($comment->comment_date)) ?> by <?php echo $comment->comment_author ?></span>
								<p><?php echo word_limiter($comment->comment_content,20) ?></p>
						 	</li>
						<?php endforeach; endif;?>
						</ul>
					</div>
					<div id="recents" class="tab_content col-md-12">
						<ul class="row">
						<?php $args=array('category_name' => 'best-practices','showposts'=> 5); ?>
						<?php query_posts($args); ?>
						<?php if(have_posts()) : while(have_posts()) : the_post();?>
						<?php $the_ID = get_the_ID(); ?>
							<li class="col-md-12">
								<h5>
									<a href="<?php the_permalink() ?>">
										<?php the_title();?>
									</a>
								</h5>
								<span><?php the_date('d/m/Y'); ?> by <?php echo get_the_author() ?></span>
								<p><?php the_content('');?></p>
						 	</li>
						<?php 
							endwhile;
							wp_reset_query();  // Restore global post data stomped by the_post().
							endif; 		
						?>
						</ul>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>