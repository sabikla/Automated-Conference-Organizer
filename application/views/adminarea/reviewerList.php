
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
			<table class="table table-striped">
            	<thead>
            	<tr>
                	<th><strong>Username</strong></th>
                	<th> </th>
                </tr>
                </thead>
                <tbody>
			  <?php foreach($reviewers as $reviewer): ?>
              	<tr>
                	<td><?php echo $reviewer['usrName']; ?>&emsp;&emsp;</td>
                
                	<td><a class="btn btn-danger btn-sm right" href="deleteItem/reviewer/<?php echo md5($reviewer['usrID']); ?>">
                      		<span class="glyphicon glyphicon-remove"></span> Reject</a>

                    </td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
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