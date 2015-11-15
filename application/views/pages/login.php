      </header>
    </div>
  </div>
</div>
<div class="body7">
  <div class="main">
    <section id="content">
      <div class="wrapper">
        <article class="col2">
          <div class="pad1"><br>
<br>
<br>

            <h2>Login</h2>
            <?php echo validation_errors(); ?>
            <?php echo form_open('verifylogin'); ?>
            	 <div style="width:450px;">
            	
                <div class="input-group">
                  <span class="input-group-addon">Email:</span>
                  <input type="text" class="form-control" name="username">
                </div>
                <div id="wrapper"></div>
                <div class="input-group">
                  <span class="input-group-addon">Password:</span>
                  <input type="password" class="form-control" name="password">
                </div>
                <div id="wrapper"></div>
                <div id="wrapper"></div>
                <div class="input-group">
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-circle-arrow-right"></span> Login
                    </button>
                </div>
                <div id="wrapper"></div>
              </div>
            </form>
            <div id="wrapper"></div><div id="wrapper"></div>
            <strong>Forgot Password? <a href="forgotPassword">Click Here</a></strong>
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