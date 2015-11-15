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
        	<?php echo validation_errors(); ?>
          <div class="pad1">
		<?php echo form_open('reviewerarea/setReview'); ?>
		<div id="wrapper"></div>
                <div class="input-group">
                  <span class="input-group-addon"> Review:</span>
                  <textarea class="form-control" name="review" rows="25"></textarea>
                </div>
                <input type="hidden" value="<?php echo $paperID; ?>" name="paper">
                <div id="wrapper"></div>
                <div class="input-group">
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-circle-arrow-right"></span> Send
                    </button>
                </div>
                </form>
                      
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