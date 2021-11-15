<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>

<div id="content" class="content">
	
        <article class="kurser_single loop_container">
			<nav id="back_nav">
			<button class="tilbage" id="tilbage">
				Tilbage
			</button>
			</nav>
			
			<article class="kurser_indhold_single">
			<article class="grid_intro">
				
				<article class="txt1">
					<h1 class="overskrift1"></h1>
					<p class="beskriv1"></p>
				</article>
				
				<article class="intro">
				 <img class="single_img" src="" alt="" />	
				</article>
				
					<article class="txtboks_grid">
			<article class="txtboks">
				<h3 class="boks_title"></h3>
				  <ul>
					<li class="varighed"></li>
					<li class="forberedelsestid"></li>
					<li class="antal"></li>
					<li class="indholder"></li>
					<li class="pris_boks"></li>
				  </ul>
				
			</article>
			</article>
				
				
				<article class="booking">
					<h3 class="booking_head">Book kursus</h3>
					<img src="https://jk26.dk/kea/2_semester/tema9/ub/wp-content/uploads/2021/11/booking.png" alt="booking">
				</article>
			
				
			</article>
				
          	
		<article class="p_grid">		
			<article class="txt2">
				<h2 class="overskrift2"></h2>
             	<p class="beskriv2"></p>
			</article>
				
			<article class="txt3">
				<h2 class="overskrift3"></h2>
             	<p class="beskriv3"></p>
			</article>
				
			<article class="txt4">
				<h2 class="overskrift4"></h2>
             	<p class="beskriv4"></p>
			</article>
				
			<article class="txt5">
				<h2 class="overskrift5"></h2>
				<p class="beskriv5"></p>
			</article>
		  </article>
        </article>
	  </article>
	
	
</div>

			
<script>
	 let kursus;
     const url = "https://jk26.dk/kea/2_semester/tema9/ub/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?> ;
	
	
    window.addEventListener("DOMContentLoaded", getJson);

      async function getJson() {
        //Promise - data lover program at komme med date, imen det køre videre
        const result = await fetch(url);
        kursus = await result.json();
		  console.log(kursus);
        visKurser();
      }

      function visKurser() {
	
        
      
      document.querySelector(".overskrift1").innerHTML = kursus.overskrift_1;
	  document.querySelector(".beskriv1").innerHTML = kursus.beskrivelse_1;
		  
	  document.querySelector(".overskrift2").innerHTML = kursus.overskrift_2;
	  document.querySelector(".beskriv2").innerHTML = kursus.beskrivelse_2;
		  
	  document.querySelector(".overskrift3").innerHTML = kursus.overskrift_3;
	  document.querySelector(".beskriv3").innerHTML = kursus.beskrivelse_3;
		  
	  document.querySelector(".overskrift4").innerHTML = kursus.overskrift_4;
	  document.querySelector(".beskriv4").innerHTML = kursus.beskrivelse_4;
		  
	  document.querySelector(".overskrift5").innerHTML = kursus.overskrift_5;
	  document.querySelector(".beskriv5").innerHTML = kursus.beskrivelse_5;
      
	  document.querySelector(".boks_title").innerHTML = kursus.info_boks_overskrift;
	  document.querySelector(".varighed").innerHTML = kursus.info_boks_laengde;
	  document.querySelector(".forberedelsestid").innerHTML = kursus.forberedelsestid;
	  document.querySelector(".antal").innerHTML = kursus.info_boks_antal_deltagere;	
	  document.querySelector(".indholder").innerHTML = kursus.info_overskrift_indhold;	
	  document.querySelector(".pris_boks").innerHTML = kursus.info_boks_pris;	
		  
      document.querySelector(".single_img").src = kursus.billede.guid;
      }
	
	 document.querySelector(".tilbage").addEventListener("click", () => {
        window.history.back();
      });

	getJson()

</script>

<?php get_footer();

	