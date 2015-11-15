
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
           <h4>General Settings</h4>
           <div style="color:#C30;">
           	<?php echo validation_errors(); ?>
           </div>
           <div style="width:450px;">
            <?php echo form_open('adminarea/setReviewer'); ?>
            <div class="input-group">
              <span class="input-group-addon">Last date of abstract:</span>
              <input type="text" class="form-control" name="lastDateofAbstract">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Last date of fullpaper:</span>
              <input type="text" class="form-control" name="lastDateofFullpaper">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Last date of Camera ready paper:</span>
              <input type="text" class="form-control" name="lastDateofCamerReadyPaper">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Last date of Registration:</span>
              <input type="text" class="form-control" name="lastDateofRegistration">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Phone numbers:</span>
              <textarea class="form-control" rows="10" name="phoneNumbers"></textarea>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Mailing Address:</span>
              <textarea class="form-control" rows="10" name="mailingAddress"></textarea>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Email Addresses:</span>
              <textarea class="form-control" rows="10" name="emailAddress"></textarea>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Email to send enquiry:</span>
              <input type="text" class="form-control" name="emailToSendEnquiry">
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