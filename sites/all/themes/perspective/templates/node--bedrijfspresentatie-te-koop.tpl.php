<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
  <?php if (!$page): ?>
      <header>
  <?php endif; ?>
      <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
      <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
  

    <?php if (!$page): ?>
      </header>
  <?php endif; ?>


  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // Hide comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

    <h4 class="advertentie-code">
    <?php
    print "ADBEDR-";
    print $node->nid;
  	?>
 	</h4>

  	<?php if ($teaser): ?>
    <!-- teaser template HTML here -->

	<div class="defaultblock">
	  <?php if (!empty($content['field_logo'])) { ?>
     	<div class="teaser-pic grid_2"><?php print render($content['field_logo'][0]); ?><br /></div>
   	  <?php } ?>
   	</div>
   	<div class="defaultblock ">
   		<div class="bodytekst">

   	<?php
   	print filter_var(ucfirst(render($content['body'])), FILTER_SANITIZE_STRING);
   	?>
		
		</div>
	</div>  

  <?php else: ?>
    <!-- regular node view template HTML here -->  

  <?php if (!empty($content['field_accommodatie'])) { ?>
  	<div class="taxonomy">
  		<?php echo t('Country/region:') ?>
  		<?php 
  		if (!empty($content['field_accommodatie'])) {
  			print render($content['field_accommodatie']); 
  		} elseif (!empty($content['field_land_tekoop'])) {
  			print render($content['field_land_tekoop']); 
  		}
  		?>
  	</div>
  <?php } ?>
  <br>
 
	<div class="wrapper contact grid_6">
	  <div class="defaultblock">
	  <?php if (!empty($content['field_logo'])) { ?>
     	<div class="teaser-pic grid_2"><?php print render($content['field_logo'][0]); ?><br /></div>
   	  <?php } ?>
		
		<div class="grid_4">
			<div class="tekstbold"><?php echo t('Name company') ?>:</div>
				<div><?php if (!empty($content['field_bedrnaam'])){ print render($content['field_bedrnaam']) ;}
				else { echo '-';} ?></div>
			<div class="tekstbold"><?php echo t('City') ?>:</div><div><?php
				if (!empty($content['field_bedrplaats'])) { print render($content['field_bedrplaats']); } 
				else { echo("-"); } ?></div>		
			<div class="tekstbold"><?php echo t('Phone') ?>:</div><div><?php 
				if (!empty($content['field_bedrtelefoonnummer'])) { print render($content['field_bedrtelefoonnummer']) ;} 
				else { echo 'n/a';} ?></div>		 
			<div class="tekstbold"><?php echo t('Website') ?>:</div>
			<div><?php 
				if (!empty($content['field_bedrwebsite'])) { print render($content['field_bedrwebsite']); } 
				else {echo 'n/a';} ?></div>
			<div class="tekstbold"><?php echo t('Email') ?>:</div><div><?php 
				if (!empty($content['field_bedre_mail'])) { print render($content['field_bedre_mail']); } 
				else { echo 'n/a';} ?></div>
	

		</div>
		<br>
	
	  </div>
	</div><!--end wrapper contact -->
	
	<div class="wrapper grid_6">	
	<hr>
	  <div class="defaultblock ">
		<div class="tekstbold"><?php echo t('Description') ?>: </div>
		<br><br>
		<div class="bodytekst">
		test
		<?php 
		if (!empty($content['body'])) {print render($content['body']);}
		else { echo t('Unfortunately the description for this accommodation is not available in English.'); }
		?>
		</div>
	  </div>

	  <hr>
	</div>

	<div class="wrapper images">
	  	<div class="defaultblock grid_6 gallery-node">	  
			<div class="tekstbold"><?php echo t('Photos') ?>: </div><br>
			<div class="tekst"><?php echo t('Click on photo to start slideshow') ?></div>

			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][0]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][1]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][2]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][3]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][4]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][5]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][6]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_bedrfotos'])) { 
				print render($content['field_bedrfotos'][7]);
			}?>
			</div>
	  	</div>
	</div><!--end wrapper images --> 
	<div class="wrapper grid_6">
		<?php if (!empty($content['field_bedrlocatie_map'])) { 
			echo("<hr>");
			print render($content['field_bedrlocatie_map']);
		}?>
	</div>

  </div><!--end content-->
  <?php endif; ?>
 
  <?php if (!empty($content['links'])): ?>
    <footer class="grid_6">
    <?php if (!$teaser){
    	echo '<br><br><br>';
    	print render($content['links']);
    }
    ?>
      
    <?php if ($teaser){
    	echo '<hr>';
    }
    ?> 
    </footer>
  <?php endif; ?>

<?php //print render($content['comments']); ?>  
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>