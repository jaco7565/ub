<!DOCTYPE HTML>
<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>

<template>
	<article class="kurser">
        <h3></h3>
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

const url = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/kursus?fbclid=IwAR1S23dQiILZ8SXFSvB9u8OmIZZZ8NgRd-i6FdwI7ZkXM0zmL5tuk0Djba8";

const catUrl = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/categories?fbclid=IwAR00rWNpxmGzOnaxP0r2HGWEGiyI_NLsBKSBH3PTGiEKIKTmz-AuyqLz8ko";


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


        if (kursus.categories.includes(9)) {

        //Er filter det samme som objekt? || betyder eller
        //Bestemt kategori eller alle objekter
   
      let klon = kursusTemplate.cloneNode(true).content;
     
      //Placer i HTML

      klon.querySelector("h3").textContent = kursus.title.rendered;
      klon.querySelector(".details").textContent = kursus.beskrivelse;
      klon.querySelector(".trin").textContent = kursus.trin;
      klon.querySelector(".fag").textContent = kursus.fag;
      klon.querySelector(".pris").textContent = kursus.pris + " kr.";
      klon.querySelector("img").src = kursus.billede.guid;
    //   klon.querySelector("article").addEventListener("click", () => {
    //     location.href = ret.link;
    //   });

      //klon.querySelector("img").src = "faces/" + ret.billede;
      container.appendChild(klon); 

        }
    });
}



</script>

<?php get_footer();
