<!DOCTYPE HTML>
<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>

<template>
	<article class="kurser">
        <h4></h4>
          <img class="kursus_img" src="" alt="" />
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


const kursusTemplate = document.querySelector("template");

const url = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/kursus?per_page=100";

const catUrl = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/categories?per_page=100";


let kurser;
let kategori;
let filterKurs;
let filter = "alle";


function start() {
     getJson(url);
}

async function getJson() {
  //Promise - data lover program at komme med date, imen det køre videre
  	let response = await fetch(url);
    let catResponse = await fetch(catUrl);
  	kurser = await response.json();
    kategori = await catResponse.json();
  console.log("Categories: ",kategori);
  	visKurser();
    
};

function visKurser() {
    const container = document.querySelector(".container");
  container.textContent = ""; //Ryd container inden loop
    kurser.forEach((kursus) => {


        if (kursus.categories.includes(13)) {

        //Er filter det samme som objekt? || betyder eller
        //Bestemt kategori eller alle objekter
   
      let klon = kursusTemplate.cloneNode(true).content;
     
      //Placer i HTML

      klon.querySelector("h4").textContent = kursus.title.rendered;
      klon.querySelector(".details").textContent = kursus.beskrivelse;
      klon.querySelector(".trin").textContent = kursus.trin;
      klon.querySelector(".fag").textContent = kursus.fag;
      klon.querySelector(".pris").textContent = kursus.pris + " kr.";
      klon.querySelector("img").src = kursus.billede.guid;
      klon.querySelector(".kurser").addEventListener("click", () => {
        location.href = kursus.link;
      });

      //klon.querySelector("img").src = "faces/" + ret.billede;
      container.appendChild(klon); 

        }
    });
}



</script>

<?php get_footer();
