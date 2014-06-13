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


						<li><a href="<? echo "$login_logout_url"; ?>" class="button special"><?php echo $login_logout_text;?> </a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->		
			<section id="banner-fix">
				
				<header class="container">
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ Mercury 墨丘里，是羅馬神話中眾神的信差<br>
								有任何想和Mercury說的話？想問Mercury的問題？或是任何的建議？<br>
								Mercury不認識你，但會真心地回覆... ”</p>
				</header>

						<!-- Content -->
							<div id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto;">
									<div class="row half">
										<div class="12u">
											<p class="story_footer letter-content letter_text" style="text-align:left;">
												嗨！有任何疑問或建議要對Mercury說嗎？或是想要給Mercury一些鼓勵呢？
												<span style="font-size:13px; font-weight:300;"> - Mercury</span>

											</p>
										</div>	
									</div>
							</div>

							<?php
								foreach ($suggestions as $_key => $suggestion) {
							?>
								<?php if($suggestion['suggest_from_user'] == 1){ ?>
									<div id="letter-background-2" class="content wrapper style2 special container small" style="margin:1em auto;">
								<?php	}else{	?>	
									<div id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto;">
								<?php	} ?>
									<div class="row half">
										<div class="12u">

								<?php
									if($suggestion['suggest_from_user'] == 1){
										echo '<p class="story_footer letter-content letter_text" style="text-align:right;">';
									}else{										
										echo '<p class="story_footer letter-content letter_text" style="text-align:left;">';
									}
								?>
										<?php echo str_replace("\n","<br>",$suggestion['suggest_text'])?>
										<br>
										<span style="font-size:13px; font-weight:300;">
										<?php 
											if($suggestion['suggest_from_user'] == 0){
												echo "Mercury - ";
											}

										echo date("m-d H:i",strtotime($suggestion['suggest_time']))?>
										</span>
									</p>

										</div>	
									</div>
							</div>




								<?php
									}
								?>


							<div id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto;">
									<div class="row half">
										<div class="12u">

										<form id="suggest_form" method="post" action="/api/insert_suggestion">
											<div class="" style="margin-bottom:1em;">
												<textarea class="story_footer letter-content" name="suggestion" id="suggest_content" rows="5" placeholder="To Mercury..."></textarea>
											</div>
											<div style="text-align:center">

												<ul class="buttons" style="margin-bottom:1px;">
													<li><a href="#" id="suggest_btn" class="small button">送出</a>	</li>
												</ul>
												<span style="font-size:13px; font-weight:300;">提醒您，閒置過久時系統會自動登出，送出前請先複製內容</span>
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
