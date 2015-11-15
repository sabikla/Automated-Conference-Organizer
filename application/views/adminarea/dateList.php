      </header>
    </div>
  </div>
</div>
<div class="body5">
  <div class="body6">
    <div class="main">
      <div class="wrapper"><br /></div>
      <div class="wrapper">
        <h2>Welcome <span>Admin</span></h2>
      </div>
    </div>
  </div>
</div>
<div class="body7">
  <div class="main">
    <section id="content">
      <div class="wrapper">
        <article class="col2">
		<?php foreach($dates as $date): ?>
         <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="panel-title"><strong><?php echo $date['dtsTitle']; ?></strong>  </span>
            </div>
            <div class="panel-body">
              <?php echo $date['dtsDesc']; ?><br />
                <a class="btn btn-danger btn-sm right" href="deleteItem/date/<?php echo md5($date['dtsID']); ?>">
                    <span class="glyphicon glyphicon-remove"></span> Delete
                </a>
               
              
             
            
           
          
 			<a class="btn btn-info btn-sm right" onclick="$('.postponer<?php echo$date['dtsID']; ?>').toggle(500);">
                    <span class="glyphicon glyphicon-time"></span> Postpone
                </a>  
        			<div class="postponer<?php echo$date['dtsID']; ?>" style="display:none;">
				<br /><br /><br />
				
				<?php echo form_open('adminarea/postponeDate'); ?>
					<input type="hidden" name="dateID" value="<?php echo md5($date['dtsID']); ?>" />
					
					<div class="input-group">
					  <span class="input-group-addon">New Date:</span>
					  <input type="text" class="form-control" value="<?php echo $date['dtsPostponed']; ?>" name="newDate">
					</div>
					<div id="wrapper"></div>
					<div class="input-group right">
						<button type="submit" class="btn btn-default btn-sm">
						  <span class="glyphicon glyphicon-circle-arrow-right"></span> Submit
						</button>
					</div>
				</form>
				</div>
       
      
     
    
   
  
                
            </div>
          </div>
         </div>
        <?php endforeach ?>
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