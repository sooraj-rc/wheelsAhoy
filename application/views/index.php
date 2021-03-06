<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- 1. About section    -->
<?php include('includes/about.php') ?>

<!-- 2. Portfolio section    -->
<?php include('includes/portfolio.php') ?>

<!-- 3. Services section    -->
<?php include('includes/services.php') ?>

<!-- 3.1. What-we-have section    -->
<?php include('includes/whatwehave.php') ?>

<!-- 4. Stock section    -->
<?php 
if($__web_settings['stock_status'] == 1){
    include('includes/stocks.php');
} 
?>

<!-- 5. Clients section    -->
<?php 
if($__web_settings['clients_status'] == 1){
    include('includes/clients.php');
}
?>

<!-- 6. Testimonials section    -->
<?php 
if($__web_settings['testimonial_status'] == 1){
    include('includes/testimonials.php');
}
?>

<!-- 7. Blogs section    -->
<?php 
if($__web_settings['blog_status'] == 1){
    include('includes/blogs.php');
} 
?>

<!-- 8. Events section    -->
<?php 
if($__web_settings['event_status'] == 1){
    include('includes/events.php');
}
?>