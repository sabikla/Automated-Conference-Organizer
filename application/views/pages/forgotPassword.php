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

            <h2>Forgot Password</h2>
            <?php echo validation_errors(); ?>
            <?php echo form_open('resetPassword'); ?>
            	
               <div style="width:450px;">
            	
                <div class="input-group">
                  <span class="input-group-addon">Email:</span>
                  <input type="text" class="form-control" name="username">
                </div>
                <div id="wrapper"></div>
                <div id="wrapper"></div>
                <div class="input-group">
                    <button type="submit" class="btn btn-default btn-sm" onClick="alert('Password reset instruction will be sent to your email.');">
                      <span class="glyphicon glyphicon-circle-arrow-right"></span> Reset Password
                    </button>
                </div>
                <div id="wrapper"></div>
              </div>
            </form>
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