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
           <h4>Add Content to about page</h4>
           <div style="color:#C30;">
           	<?php echo validation_errors(); ?>
           </div>
           <div style="width:450px;">
            <?php echo form_open('adminarea/setAboutContent'); ?>
            <div class="input-group">
              <span class="input-group-addon">Title:</span>
              <input type="text" class="form-control" name="title">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Description:</span>
              <textarea class="form-control" rows="10" name="description"></textarea>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Image:</span>
              <input type="file" class="form-control" name="image">
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Image Position :</span>
              <Select type="file" class="form-control" name="imagePosition">
				<option>Top-Left</option>
				<option>Top-Right</option>
				<option>Bottom-Left</option>
				<option>Bottom-Right</option>
			  </select>
            </div>
            <div id="wrapper"></div>
            <div class="input-group">
              <span class="input-group-addon">Tags:</span>
              <textarea class="form-control" rows="10" name="tags"></textarea>
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