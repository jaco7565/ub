<?php colibriwp_theme()->get( 'footer' )->render(); ?>

<div id="footer">
		

	<div class="info_social">

<div class="info">
	<h4>
		Kontakt 
	</h4>
	<p>
		Ungdomsbyen <br>
		 c/o Global Platform <br> 
		 Fælledvej 12C, 3. sal <br> 
		 2200 København N <br>
		 CVR-nr: 30641426
	</p>
	</div>
	
	<div class="kontakt">
	
	<p>
		info@ungdomsbyen.dk <br> +45 44 91 46 46
	</p>
	
	
</div>
	



		
</div>


<div  class="nyhedsbrev">
	<h4>
		Tilmeld nydhedsbrev
	</h4>
	
	<div class="contaioner_form">
		
  <form action="action_page.php">

    <input type="text" id="email" name="email" placeholder="Email"> 
	  
    <input type="text" id="fname" name="firstname" placeholder="Fornavn"> 

    <input type="text" id="lname" name="lastname" placeholder="Efternavn">

  

    <input type="submit" id="tilmeld_knap" value="Tilmeld">

  </form>
</div>
	
	</div>
	
	<div  class="social_media">
		
			<h4>
		Sociale medier
			</h4>
	<div  class="logoer">

	<a href="https://www.facebook.com/ungdomsbyen">	
<img src="<?php echo get_stylesheet_directory_uri(); ?>/icon/facebook_icon.png"/>	
</a>
<a href="https://www.instagram.com/ungdomsbyen/?hl=da">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/icon/instagram_icon.png"/>	
</a>
<a href="https://www.linkedin.com/company/ungdomsbyen-paedagogisk-udvikling-forloeb/?viewAsMember=true">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/icon/in.png"/>
</a>

</div>
</div>
	
	<div  class="verdensmol">
<a href="https://www.verdensmaalene.dk">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/icon/verdens_iocn.png"/>
</a>
<p id="p_udvikling" >Verdensmål For bæredygtig udvikling</p>
<p> Ungdomsbyen bidrager
 til verdensmålene </p>

</div>
	
	

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
	
