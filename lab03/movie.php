<!DOCTYPE html>
<!--Niccolò Gilli/ Reti e Sistemi informatici-->
<!--lab03/ codice html/php -->

<html lang="en">    
    
	<head>
            <title>Rancid Tomatoes</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="movie.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="banner">
                    <div id="bannerimg">
			  <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes" class="resized" /> 
		    </div>
		</div>

                <?php
                    if($_SERVER["REQUEST_METHOD"] == "GET"){
                        if(isset ($_GET["film"])){
                            $movie = $_GET["film"];
                            list($title,$year,$rating) = 
                                file ($movie."/info.txt", FILE_IGNORE_NEW_LINES);
                        }    
                    }    
                ?>
                
                <h1><?=$title?>(<?=$year?>)</h1> 
		
		
          <div id="main">
		 <div id="destra"><!-- Informazioni sul film -->
		  <div>
                    <img src="<?=$movie?>/overview.png" alt="overview" />
		  </div>
        	 	
                  <dl> 
                    <?php 						
			$overview = file($movie."/overview.txt", FILE_IGNORE_NEW_LINES);
			foreach($overview as $riga) {
			  $riga = explode(":", $riga); 
		    ?>
			<dt> <?= $riga[0]?> </dt>
			<dd> <?= $riga[1]?> </dd>
                             <?php
			 }
		    ?>
                  </dl>
		
                 </div>
		
            <div id="sinistra"> <!-- Voto e recensioni sul film -->
	          <div id="rotten"> 
                      <!-- Scelta dell'immagine in base al voto -->
                      <?php
                        if($rating>=60) {
				$img_rotten="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/freshbig.png";
			}
			else{
				$img_rotten="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rottenbig.png";
                        }
		      ?> 
                      <img src="<?=$img_rotten?>" alt="img_rotten" id="imgrotten"/>
                      <?=$rating?>%
	          </div>
		  
                <!-- Conta del numero di recensioni -->
                 <?php
                  $counter = 0;
                  foreach(glob($movie."/review*.txt") as $file){
                    $counter++;}                 
                 ?>
                 
                              
                  <div id="colonnasx">
                      <!-- Scelta del percorso del file delle recensioni -->
                      <?php
                      for($i=1;$i<(($counter/2)+1);$i++) { 
                          if(($counter>9) && ($i<10)){
                            list($review,$imgreview,$nome,$testata) = 
                                 file($movie."/review0".$i.".txt", FILE_IGNORE_NEW_LINES);}
                          else{ 
                            list($review,$imgreview,$nome,$testata) = 
                                 file($movie."/review".$i.".txt", FILE_IGNORE_NEW_LINES);}
                      ?>     
                       <p class="p1">  
                           <!-- Scelta dell'immagine in base alla recensione -->
                          <?php
                            if($imgreview == 'ROTTEN'){ ?>
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" class="imgrecensione" />
                            <?php }
                            else { ?>
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" class="imgrecensione" />
			    <?php } ?>
                           <q><?=$review?></q> 
                      
		       <p class="p2">
		            <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" class="imgcritico"/>
                               <?=$nome?><br />
                            <span class="corsivo"><?=$testata?></span>
		       </p>
                  <?php } ?>
                       
                 </div>
                
                 <div id="colonnadx">
                     <?php
                      for(;$i<$counter+1;$i++) {                                                           
                          if(($counter>9) && ($i<10)){
                            list($review,$imgreview,$nome,$testata) =
                                 file($movie."/review0".$i.".txt", FILE_IGNORE_NEW_LINES);}
                          else{ 
                            list($review,$imgreview,$nome,$testata) = 
                                 file($movie."/review".$i.".txt", FILE_IGNORE_NEW_LINES);}
                     ?>     
                       <p class="p1">  
                           <!-- Scelta dell'immagine in base alla recensione -->
                           <?php
                            if($imgreview == 'ROTTEN'){ ?>
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" class="imgrecensione" />
                            <?php }
                            else { ?>
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" class="imgrecensione" />
			    <?php } ?>
                           <q><?=$review?></q> 
                      
		       <p class="p2">
		            <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" class="imgcritico"/>
                               <?=$nome?><br />
                            <span class="corsivo"><?=$testata?></span>
		       </p>
                  <?php } ?>
                       
                 </div>  
 
            
	    </div>
                  <div id="fondo"><p>(1-<?=$counter?>) of <?=$counter?> </p></div>  	 
	  </div>                                                          

	  <div id="validators">
             <a href="ttp://validator.w3.org/check/referer">
                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/w3c-xhtml.png" alt="Validate HTML" /></a> <br />
	     <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
          </div>
	</body>
</html>
