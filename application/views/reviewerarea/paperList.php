      </header>
    </div>
  </div>
</div>
<div class="body5">
  <div class="body6">
    <div class="main">
      <div class="wrapper"><br></div>
      <div class="wrapper">
        <h2>Welcome <span><?php echo $username; ?></span></h2>
      </div>
    </div>
  </div>
</div>
<div class="body7">
  <div class="main">
    <section id="content">
      <div class="wrapper">
        <article class="col2">
          <div class="pad1">
			<div class="col-sm-12">
                <div class="list-group">
					<a href="#" class="list-group-item active">Paper List</a>
				<?php foreach($papers as $paperItem): ?>
					<div class="list-group-item">
						<?php echo $paperItem['absTitle']; ?>
                        <a class="btn btn-info btn-sm right">
                      		<span class="glyphicon glyphicon-download"></span> Download
                    	</a>
                    	
                        <a href="postReview/<?php echo md5($paperItem['absID']); ?>" class="btn btn-info btn-sm right">
                      		<span class="glyphicon glyphicon-ok"></span> Post Review
                    	</a>
      					<div class="wrapper"></div>
                    </div>
              	<?php endforeach ?>
				</div>
			</div>            
          </div>
        </article>
        <article class="col1 pad_left1">
          <?php
			$this->load->view("templates/important_dates",$dates);
		  ?>
          
        </article>
      </div>
    </section>
  </div>
</div>