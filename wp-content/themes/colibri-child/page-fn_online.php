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
		<button>
			Læs mere
		</button>
    </article>
</template>




<div id="content" class="content">

<section id="nav_kursus"></section>
     
  <section class="loop_container">
		
<section class="container"></section>
		 </section>

</div>

<script>
window.addEventListener("DOMContentLoaded", start);


const kursusTemplate = document.querySelector("template");

const url = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/kursus?per_page=100";

const catUrl = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/onlineforlb";


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


        if (kursus.onlineforlb.includes(39)) {

        //Er filter det samme som objekt? || betyder eller
        //Bestemt kategori eller alle objekter
   
      let klon = kursusTemplate.cloneNode(true).content;
     
      //Placer i HTML

      klon.querySelector("h4").innerHTML = kursus.title.rendered;
      klon.querySelector(".details").innerHTML = kursus.loop_view_beskrivelse;
      klon.querySelector(".trin").innerHTML = kursus.trin;
      klon.querySelector(".fag").innerHTML = kursus.fag;
      klon.querySelector(".pris").innerHTML = kursus.pris + " kr.";
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
