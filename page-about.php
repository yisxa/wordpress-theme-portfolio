<?php

/**
 * Template Name: About Me
 */

?>

<?php get_header(); ?>
<br>
<section class="" id="about-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<br><br><br>
				<div class="img-fluid image ">
					<img style="height:512px; width:512px;" src="<?php echo get_theme_file_uri('/assets/img/about.jpg'); ?>" alt="about me">
				</div>
			</div>
			<div class="col-md-6">
				<br><br><br>
				<div>
					<h1 class="big">About Me</h1>
				<p>Ever since cool</p>
				<ul class="about-info mt-4 px-md-0 px-2">
					<li class="d-flex"><span>Name:</span> <span>Abc Bandhu</span></li>
					<li class="d-flex"><span>Date of birth:</span> <span>November 28, 1989</span></li>
					<li class="d-flex"><span>Address:</span> <span>San Francisco CA 97987 USA</span></li>
					<li class="d-flex"><span>Zip code:</span> <span>1000</span></li>
					<li class="d-flex"><span>Email:</span> <span>abc@gmail.com</span></li>
					<li class="d-flex"><span>Phone: </span> <span>+1-2234-5678-9-0</span></li>
				</ul>
				</div>
				<div class="text">
					<p class="mb-4">
						<span class="number" data-number="120">0</span>
						<span>Project complete</span>
					</p>
					<p><a href="#" class="btn btn-primary btn-primary--modified py-2 px-2">Download Resume</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<br><br>
<?php get_footer(); ?>