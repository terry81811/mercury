
	<body class="contact loading">
	
		<!-- Header -->
			<header id="header">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信</span></a></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="/">Welcome <?php echo $user_name;?></a></li>

						<li><a href="/api/logout" class="button special">Sign Out</a></li>
					</ul>
				</nav>
			</header>

	
		<!-- Main -->
			<article id="main">

				<header class="special container">
					<span class="icon fa-envelope"></span>
					<h2>Mercury - 寫下你的故事，漂向遠方</h2>
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
				</header>
					
				<!-- One -->

				<?php foreach ($stories as $_key => $story) { ?>
					<section class="wrapper style4 container small">	
						<!-- Content -->
						<div class="12u">
				<?php	
						echo '<p class="story_content letter-content">'.str_replace("\n","<br>",$story['story_content']).'</p>';	?>
								
							<p class="story_footer letter-content" style="text-align:right;">
								<?php echo $user_nickname.' 於 '.date("m-d-Y",strtotime($story['story_time'])).'<span class="story_code"> #'.$story['story_code'].'</span>'?>
							</p>
						</div>							
					</section>

				<?php }?>
					<section class="special container small">					

					<ul class="buttons">
						<li><a id="story_send_btn" href="/write_story" class="button special">寫下另一個故事</a></li>
					</ul>

					</section>	
	
				<!-- Two -->
					
			</article>

			<footer id="footer">
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a id="contact-us" href="#" class="button">聯絡我們</a></li>
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
			</footer>


	</body>
