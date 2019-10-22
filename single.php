	<!-- for getting the header.php link to the index.php -->
	<?php get_header(); ?>
	<hr style="color:blue; width:2px;">

	<div class="section" id="b-section-header" name="Header">
		<div class="widget Header" data-version="2" id="Header1">
			<div class="header image-placement-behind no-image">
				<div class="container">
					<h1><a href="">JavaScript Tutorial</a></h1>
					<p>JavaScript</p>
				</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<!-- post content from template parts content-single -->
							<?php get_template_part('template-parts/content', 'single'); ?>
							<br>
							<!-- Add comments to the single post -->
							<?php

							if ( comments_open() || get_comments_number() ){
								comments_template();
							}

							?>
						<?php endwhile; ?>
						<?php else : ?>
							<?php echo wpautop("No posts were found"); ?>
						<?php endif; ?>
					</div>

					<div class="col-md-4">

						<?php get_sidebar(); ?>
						<!-- Side Widget -->
						<div class="card my-4">
							<h5 class="card-header">maelezo</h5>
							<div class="card-body">
								You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
							</div>
						</div>
						<!-- Side Widget -->
						<div class="card my-4">
							<h5 class="card-header">banner</h5>
							<div class="card-body">
								<p>You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!</p>
							</div>
						</div>
						<div class="card my-4">
							<h5 class="card-header">Tweeter here</h5>
							<div class="card-body">

								<a class="twitter-timeline" href="https://twitter.com/apple?">Tweets by Bandhu</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
								<a href="https://twitter.com/sample_cool?" class="twitter-follow-button" data-show-count="false">Follow @Bandhu</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- News letter section -->
		<!-- post content from template parts content-single -->
		<?php get_template_part('template-parts/newsletter'); ?>

		<!-- for getting the footer.php link to the index.php-->
		<?php get_footer(); ?>

