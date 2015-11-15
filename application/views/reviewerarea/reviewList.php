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
					<a href="#" class="list-group-item active">Review List</a>
				<?php foreach($reviews as $reviewItem): ?>
					<div class="list-group-item">
						<?php echo substr($reviewItem['rvwDesc'],0,100)."...."; ?>
                        
                    	
                        <a href="doAction/review/delete/<?php echo md5($reviewItem['rvwID']); ?>" class="btn btn-danger btn-sm right">
                      		<span class="glyphicon glyphicon-remove"></span> Delete
                    	</a>
                    	<a href="reviewInDetail/<?php echo md5($reviewItem['rvwID']); ?>" class="btn btn-success btn-sm right">
                      		<span class="glyphicon glyphicon-ok"></span> View
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