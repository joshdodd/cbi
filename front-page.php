<?php get_header(); ?>
<?php get_header('home'); ?>

<div class="slider">
	<ul class="homeslides">

		<?php
		while(has_sub_field('homepage_banner'))
		{?>
			<li>
				<?php
		          $imageArray = get_sub_field('homepage_banner_image');
		          $imageAlt = $imageArray['alt'];
		          $imageURL = $imageArray['sizes']['home-banner'];
		        ?>
		        <img src="<?php echo $imageURL;?>" alt="<?php echo $imageAlt; ?>">

			</li>

		<?
		}
		?>
	</ul>

	<div class="clear"></div>
</div>

<div class="container">
	<div class="row home-row">
		<div class="seven columns">
			<div class="black-bg home-box">
				<?php 
				$ctr = 1;
				while(have_rows('home_services')): the_row();
					$text = get_sub_field('service_name');
					$link = get_sub_field('service_link');
					?>
					<div class="service-row">
						<div class="service-img"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-blocks<?php echo $ctr;?>.png" height="50" width="87" alt=""></div>
						<div class="service"><a href="<?php echo $link; ?>"><?php echo $text;?> </a></div>
 					</div>
				<?php $ctr++; 
				endwhile; ?>
				

			</div>

		</div>

		<div class="four columns offset-by-one">
			<div class="content-block">
				<?php the_field('right_content_area');?>
			</div>
		</div>
	</div>

	<div class="row home-row">
		<div class="seven columns home-borders">
			<div class="three columns alpha  home-borders-content"><?php the_field('bottom_left_content_left');?></div>
			<div class="three columns omega offset-by-one home-borders-content"><?php the_field('bottom_left_content_right');?></div>
		</div>
	
		<div class="four columns offset-by-one home-connect">
			<div class="content-block-header">
				<h3>Connect with Us</h3>
			</div>
			<?php 
			if( get_field( "email" ) ): ?>
   			 <span class="social-icon first"><a href="mailto:<?php the_field( "email" ); ?>"><i class="fa fa-envelope"></i></a></span>
			<?php endif;
			if( get_field( "facebook" ) ): ?>
   			 <span class="social-icon"><a href="<?php the_field( "facebook" ); ?>"><i class="fa fa-facebook"></i></a></span>
			<?php endif;
			if( get_field( "twitter" ) ): ?>
   			 <span class="social-icon"><a href="<?php the_field( "twtter" ); ?>"><i class="fa fa-twitter"></i></a></span>
			<?php endif;
			if( get_field( "tumblr" ) ): ?>
   			 <span class="social-icon first"><a href="<?php the_field( "tumblr" ); ?>"><i class="fa fa-tumblr"></i></a></span>
			<?php endif;
			if( get_field( "instagram" ) ): ?>
   			 <span class="social-icon"><a href="<?php the_field( "instagram" ); ?>"><i class="fa fa-instagram"></i></a></span>
			<?php endif;
			if( get_field( "pinterest" ) ): ?>
   			 <span class="social-icon"><a href="<?php the_field( "pinterest" ); ?>"><i class="fa fa-pinterest"></i></a></span>
			<?php endif; ?>


	 	</div>
	</div>
 
</div>





<?php get_footer(); ?>