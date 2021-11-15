<?php
/*
 * Template Name: Front Page Template
 */
get_header();
?>
<?php colibriwp_theme()->get( 'front-page-content' )->render(); ?>


<script>
	
	console.log("linket up");

const kurser_boks = document.querySelector(".ch-column h-column-container d-flex h-col-lg-3 h-col-md-3 h-col-6");

kurser_boks.addEventListener("click", ()=> {
    console.log("virker");
}) 


</script>

<?php get_footer();
