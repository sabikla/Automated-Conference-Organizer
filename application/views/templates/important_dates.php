		
        <article class="col1 pad_left1">
          <h3>Important Dates</h3>
            <ul class="list-group" style="width:300px;">
            <?php foreach($dates as $date): ?>
              <li class="list-group-item">
              	<div class="glyphicon glyphicon-calendar"></div>
                <a href="#"><strong><?php if(!empty($date['dtsPostponed'])){ echo '<strike>'.$date['dtsTitle'].'</strike><br/> &emsp; '.$date['dtsPostponed']; } else { echo $date['dtsTitle']; } ?></strong></a><br>                
				&emsp;&emsp;<?php echo $date['dtsDesc']; ?>
              </li>
             <?php endforeach ?>
			 
              
            </ul>