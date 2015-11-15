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
            <?php echo validation_errors(); ?>
            <!--<form id="ContactForm" method="post" action="action/authenticate.php">-->
            
            
            <?php echo form_open('createUser'); ?>
           <div style="width:400px;">
           	<div style="padding:15px; border-left:3px solid #0000CC; background:#FFF; color:#C00;">
           		All fields are mandatory
           	</div>
           	<div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">First Name:</span>
              <input type="text" class="form-control" name="fname">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Last Name:</span>
              <input type="text" class="form-control" name="lname">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Email:</span>
              <input type="text" class="form-control" name="email">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">House Name:</span>
              <input type="text" class="form-control" name="hname">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Street:</span>
              <input type="text" class="form-control" name="street">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">City:</span>
              <input type="text" class="form-control" name="city">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">District:</span>
              <input type="text" class="form-control" name="district">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">State:</span>
              <input type="text" class="form-control" name="state">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Pincode:</span>
              <input type="text" class="form-control" name="pincode">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Mobile:</span>
              <input type="text" class="form-control" name="mobile">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Password:</span>
              <input type="password" class="form-control" name="password">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Confirm Password:</span>
              <input type="password" class="form-control" name="passconf">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">I am:</span>
              <select class="form-control" name="iam">
                    	<option value="1">Student / Research scholar</option>
                    	<option value="2">Delegate from industry</option>
                    	<option value="3">Delegate from Academic institute</option>
              </select>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
                <button type="submit" class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-circle-arrow-right"></span> Submit
                </button>
            </div>
            </form>
           </div>
            
            
              
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