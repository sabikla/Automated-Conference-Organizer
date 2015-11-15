      </header>
    </div>
  </div>
</div>
<div class="body5">
  <div class="body6">
    <div class="main">
      <div class="wrapper"><br /></div>
      <div class="wrapper">
        <h2>Welcome <span>Admin</span></h2>
      </div>
    </div>
  </div>
</div>
<div class="body7">
  <div class="main">
    <section id="content">
      <div class="wrapper">
        <article class="col2">
		<?php foreach($messages as $message): ?>
         <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="panel-title"><strong><?php echo $message['msgTitle']; ?></strong>  </span>
            </div>
            <div class="panel-body">
            	<span class="glyphicon glyphicon-calendar"></span><strong><?php echo date("d-m-Y", strtotime($message['msgDate'])); ?></strong><br />
              <?php echo $message['msgContent']; ?><br />
                <a class="btn btn-danger btn-sm right" href="deleteItem/message/<?php echo md5($message['msgID']); ?>">
                    <span class="glyphicon glyphicon-remove"></span> Delete
                </a>
            </div>
          </div>
         </div>
        <?php endforeach ?>
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