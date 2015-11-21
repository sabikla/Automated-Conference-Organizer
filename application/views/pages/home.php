<script type="text/javascript">

function changeText(cont2,speed){
    var Otext=[<?php foreach ($news as $news_item): ?> <?php echo '"'.$news_item['nwsTitle'].'",' ?> <?php endforeach ?>,"Latest Updates : ACO"];//cont1.text();
    var Ocontent=Otext[0].split("");
    var i=0;
	var k=200;
	var j=0;
    function show(){
        if(i<Ocontent.length)
        {       
            cont2.append(Ocontent[i]);
            i=i+1;
			//k=k+1;
        };
		if(i==Ocontent.length&&k==0)
		{
			cont2.empty();
			i=0;
			k=200;
			if(j==4)
			{
				//alert(j);
				j=0;
			}
			else
			{
				j=j+1;
			};
			Ocontent=Otext[j].split("");
			
		};
		if(k>0&&i==Ocontent.length)
		{
			k=k-1;
		};
    };
        var Otimer=setInterval(show,speed); 
};
$(document).ready(function(){
    changeText($(".p2"),50); //  150 = the Delay time in milliseconds between strokes.
    clearInterval(Otimer);
});

</script>
</header>
    </div>
  </div>
</div>



<div style="position:fixed; z-index:5000; margin-left:900px;  margin-top:320px;">
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fncoretech&amp;width=150&amp;layout=box_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:65px;" allowTransparency="true"></iframe>
</div>




<div class="body3" style="height:305px;">
  <div class="body4">
    <div class="main"><br />

        <div class="slideShow_side_Menu" >
        	<a href="<?php echo $pathPrefix; ?>index.php/login"><div class="MenuItemLogin"></div></a>
        	<a href="#"><div class="MenuItemInstLogo"></div></a>
        	<a href="<?php echo $pathPrefix; ?>index.php/registration"><div class="MenuItemRegistration"></div></a>
        </div>
    	<div id="slideshow" >
            <img src="<?php echo $pathPrefix; ?>images/slide0.png" class="active"  />
            <img src="<?php echo $pathPrefix; ?>images/slide1.png" />
            <img src="<?php echo $pathPrefix; ?>images/slide2.png"  />
        </div>
    </div>
  </div>
</div>
<div class="body5">
  <div class="body6">
    <div class="main" style="height:85px;">
    <img src="<?php echo $pathPrefix; ?>images/announcement.png" width="50" height="63" style="float:left; padding:10px;" />
	
	<a href="<?php echo $pathPrefix; ?>index.php/newsAndEvents"><p class="p2" style="float:left; margin-top:10px; color:#C30; font-weight:bold; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif"><noscript>Please Enable Javascript in your Browser</noscript></p></a>
    <p></p>
    </div>
  </div>
</div>
