
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信 </span></a><span class="icon fa-envelope"> 屬於我的故事</span></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="/">Welcome <?php echo $user_name;?></a></li>
						<li class="submenu">
							<a href="">我的Mercury</a>
							<ul>
								<li><a href="/write_story">寫故事</a></li>
								<li><a href="/pick">撿瓶子</a></li>
								<li><a href="/my_bottles">屬於我的故事</a></li>
								<li><a href="/bottles">我撿過的瓶子</a></li>
							</ul>
						</li>


						<li><a href="<?php echo "$login_logout_url"; ?>" class="button special"><?php echo $login_logout_text;?> </a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->		
			<section id="banner-fix">
				
				<header class="container">
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
				</header>


				<?php foreach ($stories as $_key => $story) { ?>
					<section  id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto">	
						<!-- Content -->
						<div class="12u">
				<?php	
						if(sizeof($story['new_reply']) > 0){
							echo '<span class="" style="font-size:16px; font-weight:300; color:rgb(100,100,70)">  <i class="fa fa-envelope"></i> New </span>';
						}

						echo '<p class="story_content letter-content limit-letter-content">'.str_replace("\n","<br>",$story['story_content']).'</p>';?>
								<span class="letter-content" style="font-size:13px; font-weight:300;">
									<?php echo $story['reply_count']."則對話串"?>
								<a href="/bottles/<?php echo $story['story_id']?>">看完整內容與回覆...</a>
							</span>	

							<p class="story_footer letter-content" style="text-align:right;">

								<span class="story_code">
								<?php echo date("m-d-Y",strtotime($story['story_time'])).'#'. $story['story_code']?>
								<?php
									if($story['story_type_admin'] != 2){
								?>
								<a class="lock" id="<?php echo $story['story_id'];?>" href="#"><i class="fa fa-lock"></i>沈入海底</a><br></span>
								<?php
								}else if($story['story_type_admin'] == 2){									
								?>
								<a class="unlock" id="<?php echo $story['story_id'];?>" href="#"><i class="fa fa-unlock"></i>浮回海面</a><br></span>
								<?php } ?>

							</p>
						</div>							
					</section>

				<?php }?>
				



		<!-- Footer -->
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a class="button" target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=http://mercury.so">分享給FACEBOOK朋友</a>						
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
		

			</section>
		
	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);
	</script>

	</body>
