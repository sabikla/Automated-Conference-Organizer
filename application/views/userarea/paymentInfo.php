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
          	
            <?php echo validation_errors(); ?>
            <br/>
	   <?php echo form_open_multipart('userarea/addPaymentInfo'); ?>
            <div style="width:400px;">
          	<h3>Update Payment Info</h3>	
                <div class="input-group">
                  <span class="input-group-addon">Bank:</span>
                  <input type="text" class="form-control" name="bank" required>
                </div>
            	<div id="wrapper"></div>	
                <div class="input-group">
                  <span class="input-group-addon">Branch:</span>
                  <input type="text" class="form-control" name="branch" required>
                </div>
            	<div id="wrapper"></div>	
                <div class="input-group">
                  <span class="input-group-addon">Amount:</span>
                  <input type="text" class="form-control" name="amount" required>
                </div>
            	<div id="wrapper"></div>	
                <div class="input-group">
                  <span class="input-group-addon">Transaction No:</span>
                  <input type="text" class="form-control" name="transactionNo" required>
                </div>
            	<div id="wrapper"></div>
                              
                <div class="input-group">
                  <span class="input-group-addon">Payment Type:</span>
                    <select name="paymentType" class="form-control">
                    	<option value="DD">Demend Draft</option>
                    	<option value="NEFT">NEFT</option>
                    </select>
                </div>
            	<div id="wrapper"></div> 
                <div class="input-group">
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-circle-arrow-right"></span> Add Payment Info
                    </button>
                </div>
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