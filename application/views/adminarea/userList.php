
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
                	<th><strong>Email/Username</strong></th>
                	<th><strong>Name</strong> </th>
                	<th><strong>Mobile</strong></th>
                </tr>
                </thead>
                <tbody>
			  <?php foreach($profiles as $profile): ?>
              	<tr>
                	<td><a href="userProfile/<?php echo md5($profile['usrID']); ?>"><?php echo $profile['memEmail']; ?></a>&emsp;&emsp;</td>
                
                	<td><?php echo $profile['memFirstName']." ".$profile['memLastName']; ?>&emsp;&emsp;</td>
                
                	<td><?php echo $profile['memMobile']; ?></td>
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