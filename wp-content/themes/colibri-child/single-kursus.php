<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>

<div id="content" class="content">
    
        <article class="kurser">
          <h1 class="heading"></h1>
          <img class="single_img" src="" alt="" />
          <p class="details"></p>
          <p class="pris"></p>
          <p class="trin"></p>
          <p class="fag"></p>
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
	
        
      document.querySelector(".heading").textContent = kursus.navn;
      document.querySelector(".details").textContent = kursus.beskrivelse;
      document.querySelector(".trin").textContent = kursus.trin;
      document.querySelector(".fag").textContent = kursus.fag;
      document.querySelector(".pris").textContent = kursus.pris + " kr.";
      document.querySelector(".single_img").src = kursus.billede.guid;
      }

	getJson()

</script>

<?php get_footer();

	