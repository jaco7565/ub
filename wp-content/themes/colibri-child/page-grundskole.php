<!DOCTYPE HTML>
<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>

<template>
	<article class="kurser">
        <h3></h3>
          <img class="kursus_img" src="" alt="" />
          <p class="navn"></p>
          <p class="details"></p>
          <p class="pris"></p>
          <p class="trin"></p>
          <p class="fag"></p>
    </article>
</template>




<div id="content" class="content">

<section id="nav_kursus"></section>
     
<section class="container"></section>

</div>

<script>
window.addEventListener("DOMContentLoaded", start);

function start() {
    console.log("virker");
}

</script>

<?php get_footer();
