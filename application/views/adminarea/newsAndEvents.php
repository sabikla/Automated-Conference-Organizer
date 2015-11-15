
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
		<?php foreach($news as $newsItem): ?>
         <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="panel-title"><strong><?php echo $newsItem['nwsTitle']; ?></strong>  </span>
            </div>
            <div class="panel-body">
              <?php echo $newsItem['nwsDesc']; ?><br />
                <a class="btn btn-danger btn-sm right" href="deleteItem/news/<?php echo md5($newsItem['nwsID']); ?>">
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