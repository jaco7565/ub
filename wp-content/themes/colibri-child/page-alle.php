<!DOCTYPE HTML>
<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>

<div class="menu">
	
<div class="ins">
    <h3>Institution</h3>
	<div id="trekant"></div>

	</div>
<nav id="indhold-filtrering"><button class="filter valgt" data-cont="alle">Alle</button></nav>
		<div class="valgt_info">
<h3>Du har valgt:</h3> <h3 id="inst">Alle institutioner</h3> 
</div>
<div class="tem">
    <h3>Tema</h3>
	<div id="trekant1"></div>

		</div>
<nav id="filtrering"><button class="filter valgt" data-kursus="alle">Alle</button></nav>
	<div class="valgt_info">
<h3>Du har valgt:</h3> <h3 id="tema">Alle temaer</h3> 
</div>
	


</div>

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
//const url = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/kursus?per_page=100";

const siteUrl = "<?php echo esc_url( home_url( '/' ) ); ?>";

const kursusTemplate = document.querySelector("template");
const liste = document.querySelector(".container");

let kurser = [];
let categories = [];
let indhold = [];
let filterKursus = "alle";
let filter = "alle";
let filterIndhold = "alle";
	
const institution = document.querySelector(".ins");
const tema = document.querySelector(".tem");


window.addEventListener("DOMContentLoaded", start);


function start() {
	institution.addEventListener("click", showIndhold);
	tema.addEventListener("click", showFilt);
    console.log("id er", <?php echo get_the_ID() ?>);
    console.log(siteUrl);
    getJson();
}

async function getJson() {
  //Promise - data lover program at komme med date, imen det køre videre

    const url = siteUrl +"wp-json/wp/v2/kursus?per_page=100";
    //hent basis categories
    const catUrl = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/categories?per_page=100";
    //hent custom category: indhold
    const contUrl = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/indhold";
    let response = await fetch(url);
    let catResponse = await fetch(catUrl);
    let contResponse = await fetch(contUrl);

    kurser = await response.json();
    categories = await catResponse.json();
    indhold = await contResponse.json();
    
    visKurser();
    opretKnapper();
    
};

function opretKnapper(){
            
    categories.forEach(cat=>{
     //console.log(cat.id);
    if(cat.name != "Uncategorized"){
    document.querySelector("#filtrering").innerHTML += `<button class="filter" data-kursus="${cat.id}">${cat.name}</button>`
        }
    })
    indhold.forEach(cont=>{
        console.log(cont.id);
        document.querySelector("#indhold-filtrering").innerHTML += `<button class="filter" data-cont="${cont.id}">${cont.name}</button>`
             
            })
        addEventListenersToButtons();
        }

function visKurser() {
    console.log(kurser);
    console.log("visKurser");
    liste.innerHTML = "";
    console.log({filterKursus});
    console.log({filterIndhold});
    kurser.forEach(kursus => {
        console.log(kursus.indhold)
    //tjek filterKursus og filterIndhold til filtrering
        if ((filterKursus == "alle"  || kursus.categories.includes(parseInt(filterKursus))) && (filterIndhold == "alle"  || kursus.indhold.includes(parseInt(filterIndhold)))) {
            const klon = kursusTemplate.cloneNode(true).content;
            klon.querySelector("h4").innerHTML = kursus.title.rendered;
            klon.querySelector(".details").innerHTML = kursus.loop_view_beskrivelse;
            klon.querySelector(".trin").innerHTML = kursus.trin;
            klon.querySelector(".fag").innerHTML = kursus.fag;
            klon.querySelector(".pris").innerHTML = kursus.pris + " kr.";
            klon.querySelector("img").src = kursus.billede.guid;
            klon.querySelector(".kurser").addEventListener("click", () => {
                location.href = kursus.link;
                    })
                    liste.appendChild(klon);
                }
            })

        }

 function addEventListenersToButtons() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.addEventListener("click", filtrering);
            })
             document.querySelectorAll("#indhold-filtrering button").forEach(elm => {
                elm.addEventListener("click", filtreringIndhold);
            })
        }
  function filtrering() {
            filterKursus = this.dataset.kursus;
            document.querySelector("#tema").textContent = this.textContent;
            //fjern .valgt fra alle
            document.querySelectorAll("#filtrering .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
          
            //tilføj .valgt til den valgte
            this.classList.add("valgt");
            visKurser();
        }
    function filtreringIndhold() {
            filterIndhold = this.dataset.cont;
            document.querySelector("#inst").textContent = this.textContent;
                //fjern .valgt fra alle
            document.querySelectorAll("#indhold-filtrering .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
            //tilføj .valgt til den valgte
            this.classList.add("valgt");
            visKurser();
        }
	
	//Menu til knapper:
	
	function showIndhold() {
		const indhold_filt = document.querySelector("#indhold-filtrering");
  		if (indhold_filt.style.display === "none") {
    	indhold_filt.style.display = "flex";
			document.querySelector("#trekant").style.transform ="rotate(-45deg)"
  		} else {
    	indhold_filt.style.display = "none";
		document.querySelector("#trekant").style.transform ="rotate(45deg)"
			
  }
		
	}
	
		function showFilt() {
		const filt = document.querySelector("#filtrering");
  		if (filt.style.display === "none") {
    	filt.style.display = "flex";
		document.querySelector("#trekant1").style.transform ="rotate(-45deg)"
  		} else {
    	filt.style.display = "none";
		document.querySelector("#trekant1").style.transform ="rotate(45deg)"
  }
		
	}
	


</script>

<?php get_footer();

