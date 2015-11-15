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
			  		<?php $deptID=0;
					foreach($abstracts as $abstract):
						if($deptID!=$abstract['absDept'])  
						{
							switch($abstract['absDept'])
							{
								case 1:
									$department="Information Science";
									break;
								case 2:
									$department="Electrical Science";
									break;
								case 3:
									$department="Mechanical Science";
									break;
							}
							echo '<a href="#" class="list-group-item active">'.$department.'</a>';
							$deptID=$abstract['absDept'];
						}
					?>
                    
                    
                    <div class="list-group-item">
						<?php echo $abstract['absTitle']; ?>
                        
                        <a class="btn btn-info btn-sm right" target="_blank" href="doActionOnCamerapaper/download/<?php echo md5($abstract['absID']); ?>">
                      		<span class="glyphicon glyphicon-download"></span> Download
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