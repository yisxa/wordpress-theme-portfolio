<?php 

/**
 * Template Name: ContactUs
 */


 ?>


<?php get_header(); ?>

<main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>Contact me</h2>
                </div>
                <form>
                    <div class="form-group"><label for="name">Your Name</label><input class="form-control item" type="text" id="name"></div>
                    <div class="form-group"><label for="subject">Subject</label><input class="form-control item" type="text" id="subject"></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email"></div>
                    <div class="form-group"><label for="message">Message</label><textarea class="form-control item" id="message"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-primary--modified btn-block btn-lg" type="button">Submit Form</button></div>
                </form>
            </div>
        </section>
    </main>

<?php get_footer(); ?>