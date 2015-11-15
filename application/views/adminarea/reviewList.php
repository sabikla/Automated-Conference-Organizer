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
        <article class="col2" style="width:900px;">
          <div class="pad1">
			<table class="table table-striped">
            	<thead>
            	<tr>
                	<th><strong>Review &emsp;&emsp;</strong></th>
                	<th><strong>Paper&emsp;</strong> </th>
                	<th><strong>Author&emsp;</strong></th>
                	<th width="100"> &emsp;<strong> Status &emsp;</strong></th>
                </tr>
                </thead>
                <tbody>
			  <?php foreach($reviews as $review): ?>
              	<tr>
                	<td><a href="userProfile/<?php //echo md5($profile['usrID']); ?>"><?php echo substr($review['rvwDesc'],0,100); ?></a>&emsp;&emsp;</td>
                
                	<td><?php echo $review['absTitle']; ?>&emsp;&emsp;</td>
                
                	<td><?php echo $review['memFirstName']; ?></td>
                	<td>
	        		<div class="btn-group">
				  <a href="#" class="btn btn-success">
				    Accept
				  </a>
				</div>
                	</td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </article>
      </div>
    </section>
  </div>
</div>