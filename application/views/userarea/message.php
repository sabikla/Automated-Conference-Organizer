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
          <table border="0">
          	<tr>
            	<td>
                <strong>Message From Admin</strong><br />
                </td>
            </tr>
              <tr>
                <td>
                </td>
              </tr>
            </table>
                <div class="col-sm-12">
          			<?php foreach($messages as $messageItem):
					  
					  
					
					?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="panel-title"><b>
					  	<?php echo $messageItem['msgTitle']; 	?>
                      </b></div>
                    </div>
                    <div class="panel-body">
                    	<span class="glyphicon glyphicon-calendar"></span><strong><?php echo date("d-m-Y", strtotime($messageItem['msgDate'])); ?></strong><br />
						<?php echo $messageItem['msgContent']; ?>
                    </div>
                  </div>
           			<?php //}
		   				endforeach ?>
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