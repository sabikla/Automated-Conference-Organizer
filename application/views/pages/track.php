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
            <h3>Conference Tracks</h3>
			<h3 style="color:#FF0000; font-size:16px;">Areas to be covered, but not limited to</h3>
          </div>
          
		<?php foreach($tracks as $track): ?>
		  <div class="box2">
            <div class="box2_top">
              <div class="box2_bot">
                <div class="pad">
                  <div class="wrapper">
                    <figure class="left"> <a href="#"><img src="../images/marker_1.gif" alt=""></figure>
                    <div class="cols" style="text-align:justify;"> <strong style="font-size:16px;"><?php echo $track['trkTitle']; ?></strong></a> <?php echo $track['trkDesc']; ?> </div>
                </div>
              </div>
            </div>
          </div>
		<?php endforeach ?>
		
          
          
          
          
          	
            
        </article>
          <?php
			$this->load->view('templates/important_dates', $dates);
		  ?>
          <div class="box1">
            <div class="box1_bot">
              <div class="box1_top">
                <div class="pad">
                  <h2>Registration Fee</h2>
                  <ul>
                  	<li><strong>1.</strong> Delegates from industry : Rs.2000/-</li><br>
                  	<li><strong>2.</strong> Delegates from   Academic Institute : Rs.1500/-</li><br>
                  	<li><strong>3.</strong> Student / Research Scholar Delegate : Rs.750/-</li>
                  </ul>
                  
                </div>
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>
  </div>
</div>