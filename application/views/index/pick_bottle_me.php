
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信 </span></a><span class="icon fa-envelope"> 屬於我的故事 /</span></h1>
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


						<li><a href="<? echo "$login_logout_url"; ?>" class="button special"><?php echo $login_logout_text;?> </a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->		
			<section id="banner-fix">
				
				<header class="container">
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
				</header>
						<!-- Content -->
							<div id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto;">
									<div class="row half">
										<div class="12u">
								<?php	
										echo '<p class="story_content letter-content">'.str_replace("\n","<br>",$story['story_content']).'</p>';	?>
												
											<p class="story_footer letter-content" style="text-align:right;">
												<span style="font-size:13px; font-weight:300;">												<?php echo $user_nickname.' 於 '.date("m-d-Y",strtotime($story['story_time'])).'<span class="story_code"> #'.$story['story_code'].'</span>'?>
												</span>
											</p>
							
									</div><!-- letter-background-->
								</div><!--raw half-->
							</div><!--12u-->


							<?php
								foreach ($replies as $_key => $reply) {
							?>
							<div id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto;">
									<div class="row half">
										<div class="12u">
								<?php

									if($reply['new_reply'] > 0){
										echo '<span class="" style="font-size:16px; font-weight:300; color:rgb(100,100,70)">  <i class="fa fa-envelope"></i> New </span>';
									}

									if($reply['is_send'] == true){
										echo '<p class="story_footer letter-content" style="text-align:right;">';
									}else{										
										echo '<p class="story_footer letter-content" style="text-align:left;">';
									}
								?>
										<?php echo $reply['reply_text'] ?>
										<br>
										<span style="font-size:13px; font-weight:300;">
										<?php echo $reply['user_nickname'];?>
										<?php echo ' '.date("m-d H:i",strtotime($reply['reply_time']))?>
										<a href="/bottles_reply/<?php echo $story['story_id']."?sender_id=".$reply['reply_sender_id']?>">回覆<?php echo $reply['user_nickname']?></a>
										</span>
									</p>



										</div>	
									</div>


							</div>
								<?php
									}
								?>

				
		


		<!-- Footer -->
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a href="#" class="button">聯絡我們</a></li>
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
				</section>
	

	</body>
