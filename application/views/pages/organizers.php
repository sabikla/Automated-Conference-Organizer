      </header>
    </div>
  </div>
</div>
<div class="body7">
  <div class="main">
    <section id="content">
      <div class="wrapper">
        <article class="col2">
          <div class="pad1">          	
			<?php
				$currentCommittee = ''; 
				foreach($organizers as $organizer): ?>
			<?php
				if($organizer['cmtName']!=$currentCommittee){
					if($currentCommittee!=''){
						echo '
            </ul>';
					}			
					echo '<h3>'.$organizer['cmtName'].'</h3>
					
            <ul>';
					$currentCommittee = $organizer['cmtName'];
				}
				if($organizer['cmmDesignation']!=''){
				
			?>
				
				<li><strong><?php echo $organizer['cmmDesignation']; ?></strong></li>
            	<li>&emsp;&emsp;
            <?php
				}
				else{
            ?>
				<li>
			<?php } ?>
				<?php echo $organizer['cmmName']; ?>
				</li>	
        	<?php endforeach ?>
          	    
          </div>
        </article>
          <?php
			$this->load->view('templates/important_dates', $dates);
		  ?>
        </article>
      </div>
    </section>
  </div>
</div>