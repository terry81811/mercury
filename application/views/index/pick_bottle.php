
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信 </span></a><span class="icon fa-envelope"> 撿。瓶子</span></h1>
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
						<!-- Content -->
							<div id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto;">
									<div class="row half">
										<div class="12u">

								<?php	
										echo '<p class="story_content letter-content letter_text">'.str_replace("\n","<br>",$story['story_content']).'</p>';	?>
												
											<p class="story_footer letter-content" style="text-align:right;">
												<span style="font-size:13px; font-weight:300;">
												<?php echo $user_nickname.' 於 '.date("m-d-Y",strtotime($story['story_time'])).'<span class="story_code"> #'.$story['story_code'].'</span>'?>
												</span>
											</p>

									</div><!-- letter-background-->
								</div><!--raw half-->
							</div><!--12u-->

							<?php
								foreach ($replies as $_key => $reply) {
							?>
								<?php if($reply['is_send'] == true){ ?>
									<div id="letter-background-2" class="content wrapper style2 special container small" style="margin:1em auto;">
								<?php	}else{	?>	
									<div id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto;">
								<?php	} ?>
									<div class="row half">
										<div class="12u">

								<?php
									if($reply['is_send'] == true){
										echo '<p class="story_footer letter-content letter_text" style="text-align:right;">';
									}else{										
										echo '<p class="story_footer letter-content letter_text" style="text-align:left;">';
									}
								?>
										<?php echo str_replace("\n","<br>",$reply['reply_text'])?>
										<br>
										<span style="font-size:13px; font-weight:300;">
										<?php echo $reply['user_nickname'].' '.date("m-d H:i",strtotime($reply['reply_time']))?>
										</span>
									</p>

										</div>	
									</div>
							</div>




								<?php
									}
								?>

							<div id="letter-background" class="response_div content wrapper style2 special container small" style="margin:1em auto;">
									<div class="row half">
										<div class="12u">

										<form id="response_form" method="post" action="/api/story_response">
											<div class="" style="margin-bottom:1em;">
												<input type="hidden" name="story_id" value="<?php echo $story['story_id'];?>">
												<input type="hidden" name="reply_to_id" value="<?php echo $story['story_user_id'];?>">
												<textarea class="story_footer letter-content" name="response_content" id="response_content" rows="5" placeholder="To <?php echo $user_nickname?>，我..."></textarea>
											</div>
											<div style="text-align:center">

												<ul class="buttons" style="margin-bottom:1px;">
													<li><a href="#" id="pick_response" class="small button">回覆</a>	</li>
												</ul>
												<span style="font-size:13px; font-weight:300;">提醒您，閒置過久時系統會自動登出，送出前請先複製回覆內容</span>
											</div>
										</form>

										</div>	
									</div>
							</div>
				
		


		<!-- Footer -->
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a class="button" target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=http://mercury.so">分享給FACEBOOK朋友</a>						
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
				</section>
	

	</body>
