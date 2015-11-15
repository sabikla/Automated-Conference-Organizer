
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
                <td>Name</td>
                <td><?php echo $profile['memFirstName']." ".$profile['memLastName']; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?php echo $profile['memEmail']; ?></td>
              </tr>
              <tr>
                <td>House&emsp;</td>
                <td><?php echo $profile['memHouseName']; ?></td>
              </tr>
              <tr>
                <td>Street&emsp;</td>
                <td><?php echo $profile['memStreet']; ?></td>
              </tr>
              <tr>
                <td>City&emsp;</td>
                <td><?php echo $profile['memCity']; ?></td>
              </tr>
              <tr>
                <td>District</td>
                <td><?php echo $profile['memDistrict']; ?></td>
              </tr>
              <tr>
                <td>State</td>
                <td><?php echo $profile['memState']; ?></td>
              </tr>
              <tr>
                <td>Pincode</td>
                <td><?php echo $profile['memPincode']; ?></td>
              </tr>
              <tr>
                <td>Mobile</td>
                <td><?php echo $profile['memMobile']; ?></td>
              </tr>
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