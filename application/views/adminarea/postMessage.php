
      </header>
    </div>
  </div>
</div>

<script type="text/javascript">
function showUserList(){
	var a = document.getElementById("msgTo");
	if(a.value==4)
	{
		$("#userList").show("slow"); 
	}
	else
	{
		$("#userList").hide("slow"); 
	}
}
</script>
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
           <div style="color:#C30;">
           	<?php echo validation_errors(); ?>
           </div>
           <div style="width:450px;">
            <?php echo form_open('adminarea/setMessage'); ?>
            <div class="input-group">
              <span class="input-group-addon">Message Title:</span>
              <input type="text" class="form-control" name="msgTitle">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Message Description:</span>
              <textarea rows="20" class="form-control" name="msgDesc">
              </textarea>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Message To:</span>
              <Select class="form-control" name="msgTo" onchange="showUserList();" id="msgTo">
              	<option value="0">-----------------------------------------</option>
              	<option value="1">To all Users</option>
              	<option value="2">To all Reviewers</option>
              	<option value="3">To all Participants</option>
              	<option value="4">To Selected Participants</option>
              </select>
            </div>
            <div id="wrapper"></div>
            <div class="input-group" id="userList" style="display:none;">
              <span class="input-group-addon">Select Users:</span>
              <Select class="form-control" name="msgUsers[]" multiple="multiple">              
			  	<?php foreach($profiles as $profile): ?>
              	<option value="<?php echo $profile['usrID']; ?>"><?php echo $profile['memFirstName']." ".$profile['memLastName']; ?></option>
              	<?php endforeach ?>
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