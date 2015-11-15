      </header>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("#showUploader").click(function(){
	$("#uploader").slideToggle("slow");  
  });
});
</script>
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
					<a href="#" class="list-group-item active">Abstract List</a>
				<?php foreach($papers as $paperItem): ?>
					<div class="list-group-item">
						<?php echo $paperItem['absTitle']; ?>
						
                        <a href="doActionOnAbstract/remove/<?php echo md5($paperItem['absID']); ?>" class="btn btn-danger btn-sm right">
                      		<span class="glyphicon glyphicon-remove"></span> Remove
                    	</a> 
                        <a target="_blank" href="doActionOnAbstract/download/<?php echo md5($paperItem['absID']); ?>" type="submit" class="btn btn-info btn-sm right">
                      		<span class="glyphicon glyphicon-download"></span> Download
                    	</a>
                    	<span class="badge pull-left">
                    	<?php 
                    	
                    	if($paperItem['absStatus']==0)
                    		echo "Pending"; 
                    	else if($paperItem['absStatus']==1)
                    		echo "Accepted"; 
                    	else if($paperItem['absStatus']==2)
                    		echo "Rejected"; 
                    	
                    	
                    	?>
                    	</span>
      					<div class="wrapper"></div>
                    </div>
              	<?php endforeach ?>
				</div>
			</div>
<br/><br/>

			<div class="col-sm-12">
                <div class="list-group">
					<a href="#" class="list-group-item active">Fullpaper list</a>
				<?php foreach($fullpapers as $fullpaperItem): ?>
					<div class="list-group-item">
						<?php echo $fullpaperItem['absTitle']; ?>
						
                        <a href="doActionOnFullpaper/remove/<?php echo md5($fullpaperItem['absID']); ?>" class="btn btn-danger btn-sm right">
                      		<span class="glyphicon glyphicon-remove"></span> Remove
                    	</a> 
                        <a target="_blank" href="doActionOnFullpaper/download/<?php echo md5($fullpaperItem['absID']); ?>" type="submit" class="btn btn-info btn-sm right">
                      		<span class="glyphicon glyphicon-download"></span> Download
                    	</a>
                    	<span class="badge pull-left">
                    	<?php 
                    	
                    	if($fullpaperItem['absStatus']==0)
                    		echo "Pending"; 
                    	else if($fullpaperItem['absStatus']==1)
                    		echo "Accepted"; 
                    	else if($fullpaperItem['absStatus']==2)
                    		echo "Rejected"; 
                    	
                    	
                    	?>
                    	</span>
      					<div class="wrapper"></div>
                    </div>
              	<?php endforeach ?>
				</div>
			</div>
<br/><br/>

		<div class="col-sm-12">
                <div class="list-group">
					<a href="#" class="list-group-item active">Camera Ready Paper List</a>
				<?php foreach($cameraPapers as $cameraPaperItem): ?>
					<div class="list-group-item">
						<?php echo $cameraPaperItem['absTitle']; ?>
						
                        <a href="doActionOnCamerapaper/remove/<?php echo md5($cameraPaperItem['absID']); ?>" class="btn btn-danger btn-sm right">
                      		<span class="glyphicon glyphicon-remove"></span> Remove
                    	</a> 
                        <a target="_blank" href="doActionOnCamerapaper/download/<?php echo md5($cameraPaperItem['absID']); ?>" type="submit" class="btn btn-info btn-sm right">
                      		<span class="glyphicon glyphicon-download"></span> Download
                    	</a>
                    	<span class="badge pull-left">
                    	<?php 
                    	
                    	if($cameraPaperItem['absStatus']==0)
                    		echo "Pending"; 
                    	else if($cameraPaperItem['absStatus']==1)
                    		echo "Accepted"; 
                    	else if($cameraPaperItem['absStatus']==2)
                    		echo "Rejected"; 
                    	
                    	
                    	?>
                    	</span>
      					<div class="wrapper"></div>
                    </div>
              	<?php endforeach ?>
				</div>
			</div>
<br/><br/>



			<br/><br/>
            <div class="input-group">
                <button type="button" class="btn btn-default btn-sm" id="showUploader">
                  <span class="glyphicon glyphicon-plus"></span> Show/Hide Uploder
                </button>
            </div><br /><br />
            <?php echo $message; ?>
            <br/>
            <?php echo validation_errors(); ?>
            <div>
            <?php 
            $this->load->helper('date');
            $datestring = "%Y-%m-%d";
		$time = time();
//echo $lastDates['AbsLastDate'];
		if(mdate($datestring, $time)>$lastDates['flpLastDate'])
		{
		//echo "Time for camer ready paper";
		?>
		
		
		<?php echo form_open_multipart('userarea/postPaper'); ?>
            <div id="uploader" style="width:400px;">	
            <h3>Upload Camer Ready Paper</h3>	
                <div class="input-group">
                  <span class="input-group-addon">Paper Title:</span>
                  <input type="text" class="form-control" name="paperTitle">
                </div>
            	<div id="wrapper"></div>
                <div class="input-group">
                  <span class="input-group-addon">Choose File:</span>
                  <input type="file" class="form-control" name="userfile">
                </div>
            	<div id="wrapper"></div>                
                <div class="input-group">
                  <span class="input-group-addon">Section:</span>
                    <select name="department" class="form-control">
                    	<option value="1">A - Information Science</option>
                    	<option value="2">B - Electrical Science</option>
                    	<option value="3">C - Mechanical Science</option>
                    </select>
                </div>
                
            	<div id="wrapper"></div> 
                <div class="input-group">
                  	<input type="hidden" name="paperType" value="3" />
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-circle-arrow-right"></span> Upload Paper
                    </button>
                </div>
            </div> 
            </form>
            
            
		<?php
		}
		else if (mdate($datestring, $time)>$lastDates['AbsLastDate']&&($abstractCount['accepted']>0||($abstractCount['pending']==0&&$abstractCount['rejected']==0)))
		{
		
		?>
		
		
		<?php echo form_open_multipart('userarea/postPaper'); ?>
            <div id="uploader" style="width:400px;">	
            <h3>Upload fullpaper</h3>	
                <div class="input-group">
                  <span class="input-group-addon">Paper Title:</span>
                  <input type="text" class="form-control" name="paperTitle">
                </div>
            	<div id="wrapper"></div>
                <div class="input-group">
                  <span class="input-group-addon">Choose File:</span>
                  <input type="file" class="form-control" name="userfile">
                </div>
            	<div id="wrapper"></div>                
                <div class="input-group">
                  <span class="input-group-addon">Section:</span>
                    <select name="department" class="form-control">
                    	<option value="1">A - Information Science</option>
                    	<option value="2">B - Electrical Science</option>
                    	<option value="3">C - Mechanical Science</option>
                    </select>
                </div>
                
            	<div id="wrapper"></div> 
                <div class="input-group">
                  	<input type="hidden" name="paperType" value="2" />
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-circle-arrow-right"></span> Upload Paper
                    </button>
                </div>
            </div> 
            </form>
            
            
		<?php
		}
		else
		{
		 ?>
            <?php echo form_open_multipart('userarea/postPaper'); ?>
            <div id="uploader" style="width:400px;">
            <h3>Upload abstract</h3>	
                <div class="input-group">
                  <span class="input-group-addon">Paper Title:</span>
                  <input type="text" class="form-control" name="paperTitle">
                </div>
            	<div id="wrapper"></div>
                <div class="input-group">
                  <span class="input-group-addon">Choose File:</span>
                  <input type="file" class="form-control" name="userfile">
                </div>
            	<div id="wrapper"></div>                
                <div class="input-group">
                  <span class="input-group-addon">Section:</span>
                    <select name="department" class="form-control">
                    	<option value="1">A - Information Science</option>
                    	<option value="2">B - Electrical Science</option>
                    	<option value="3">C - Mechanical Science</option>
                    </select>
                </div>
                
            	<div id="wrapper"></div> 
                <div class="input-group">
                  	<input type="hidden" name="paperType" value="1" />
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-circle-arrow-right"></span> Upload Paper
                    </button>
                </div>
            </div> 
            </form>
            <?php } ?>
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