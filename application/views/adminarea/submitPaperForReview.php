      </header>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $pathPrefix; ?>js/ajaxapi/adminapi.js"></script>
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
           <h4>Submit Paper For Review</h4>
           <div style="color:#C30;">
           	<?php echo validation_errors(); ?>
           </div>
           <div style="width:450px;">
            <?php echo form_open('adminarea/setPaperForReview'); ?>
            <div class="input-group">
              <span class="input-group-addon">Reviewer:</span>
              <select class="form-control" name="reviewer[]" multiple="multiple">
				<?php foreach($reviewers as $reviewer): ?>
				<option value="<?php echo $reviewer['usrID']; ?>"><?php echo $reviewer['usrName']; ?></option>
				<?php endforeach ?>
              </select>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">department:</span>
              <select class="form-control" onchange="loadPaper(this.value)" id="dept" name="dept">
                    	<option value="1">A - Information Science</option>
                    	<option value="2">B - Electrical Science</option>
                    	<option value="3">C - Mechanical Science</option>
              </select>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Papers:</span>
				<span id="paperList">
				</span>
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
<script type="text/javascript">
/*$('#dept').click(function(){
	var from_data={
		dept:$('#dept').val(),
		ajax:'1'
	};
	alert();*/
	/*var dept=$('#dept').val();
	$.ajax({
		url:"../ajaxApi/papers/"+dept,
		type:'GET',
        data: {'n':1},
		success:function(data){	
		alert(data);
            $('#paperList').html(data["paper_data"]);
		},
        error:function(){
            alert("failure");
        }
	});
	return false;
});*/
</script>