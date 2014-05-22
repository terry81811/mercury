
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信</span></a></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="/">Welcome <?php echo $user_name;?></a></li>
						<li class="submenu">
							<a href="">我的Mercury</a>
							<ul>
								<li><a href="/write_story">寫故事</a></li>
								<li><a href="/pick">撿瓶子</a></li>
								<li><a href="/my_story">屬於我的故事</a></li>
								<li><a href="/bottles">我撿過的瓶子</a></li>
							</ul>
						</li>


						<li><a href="<? echo "$login_logout_url"; ?>" class="button special"><?php echo $login_logout_text;?> </a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->		
			<section id="banner">
				
				<header class="container">
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
				</header>
						<!-- Content -->
							<div id="letter-background" class="content wrapper style2 special container small">


									<div class="row half">
										<div class="12u">
								<?php	
										echo '<p class="story_content letter-content">'.str_replace("\n","<br>",$story['story_content']).'</p>';	?>
												
											<p class="story_footer letter-content" style="text-align:right;">
												<span style="font-size:13px; font-weight:300;">
												<?php echo $user_school.' '.$user_department.'<br>';?>
												</span>
												<?php echo $user_nickname.' 於 '.date("m-d-Y",strtotime($story['story_time'])).'<span class="story_code"> #'.$story['story_code'].'</span>'?>
											</p>
										</div>	
									</div>


							</div>
				
			</section>
		


		<!-- Footer -->
			<footer id="footer">
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a href="#" class="button">聯絡我們</a></li>
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
		
			</footer>


	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);
	</script>

	</body>
