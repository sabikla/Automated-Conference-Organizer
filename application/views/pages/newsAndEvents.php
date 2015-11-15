
      </header>
    </div>
  </div>
</div>
<div class="body7">
  <div class="main">
    <section id="content">
      <div class="wrapper">
        <article class="col2">
		<?php foreach($news as $newsItem): ?>
         <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <span class="panel-title"><strong><?php echo $newsItem['nwsTitle']; ?></strong></span>
            </div>
            <div class="panel-body">
              <?php echo $newsItem['nwsDesc']; ?>
            </div>
          </div>
         </div>
        <?php endforeach ?>
        </article>
        <article class="col1 pad_left1">
          <?php
			$this->load->view('templates/important_dates', $dates);
		  ?>
          
        </article>
      </div>
    </section>
  </div>
</div>