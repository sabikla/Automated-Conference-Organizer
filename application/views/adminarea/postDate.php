
      </header>
    </div>
  </div>
</div>
<div class="body5">
  <div class="body6">
    <div class="main">
      <div class="wrapper"><br></div>
      <div class="wrapper">
        <h2>Welcome Back,<span> Admin</span></h2>
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
           <noscript class="alert alert-danger" role="alert">
           	Please Enable Javascript
           </noscript>
           <h4>Post Date</h4>
           <div style="color:#C30;">
           	<?php echo validation_errors(); ?>
           </div>
           <div style="width:450px;">
            <?php echo form_open('adminarea/setDate'); ?>
            <div class="input-group">
              <span class="input-group-addon">Date:</span>
              <input type="text" class="form-control" name="date">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Description:</span>
              <textarea  rows="5" class="form-control" name="desc"></textarea>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
                <button type="submit" class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-circle-arrow-right"></span> Submit
                </button>
            </div>
            </form>
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