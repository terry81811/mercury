
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信</span></a></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="/">Welcome</a></li>

						<?php

						?>

						<li><a href="<? echo "$login_logout_url"; ?>" class="button special"><?php echo $login_logout_text;?> </a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->		
			<section id="banner">
				
				<!--
					".inner" is set up as an inline-block so it automatically expands
					in both directions to fit whatever's inside it. This means it won't
					automatically wrap lines, so be sure to use line breaks where
					appropriate (<br />).
				-->
				<div class="inner">
					
<header style="max-width:500px;">
					<img style="max-width:100%; margin: 0 auto;" src="../assets/img/logo3.png" alt="">
</header>



					<p>當遠方送來一個搭載故事的漂流瓶<br/>你會認真回覆，還是讓機會隨海浪消失？</p>
					<p style="font-style:italic; font-size:16px;"><br>有<?php echo $users_count+90;?>個人在Mercury寫下他們的故事</p>
					<footer>
						<ul class="buttons vertical">
							<li><a href="<?php  echo "$fb_login_url"; ?>" class="button fit scrolly">寫下我的故事</a></li>
						</ul>
					</footer>
				
				</div>
				
			</section>
		
		<!-- Main -->
			<article id="main">

				<header class="special container" style="padding-top:0px;">


					<img style="max-width:45px;" src="../assets/img/bottle.png" alt="">
					<h2>厭倦了過於直接的速食交友？來交筆友吧</h2>
					<p>或許我們可以先從身邊的朋友開始，透過文字重新認識他們<br>又或者是從生活圈相近但不曾見面的人，同學？同事？朋友的朋友？
						<br>5/12 - 5/23 <a href="<?php  echo "$fb_login_url"; ?>">寫下你的故事</a>，放入漂流瓶，等待被撿起的那一天</p>
				</header>

				<!-- Two -->
					<section class="wrapper style1 container special">
						<div class="row">
							<div class="4u">
							
								<section>
									<span class="icon feature fa-pencil"></span>
									<header>
										<h3>5/12-23 寫下你的故事</h3>
									</header>
									<p>在這裡寫下想說的心情， Mercury就會幫你做成實體瓶中信，傳遞給即將認識的新朋友！只要夠真心誠意，不只能抽到實體禮物，還能收到最溫暖的回應。</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-users"></span>
									<header>
										<h3>5/26-30 撿起別人的漂流瓶</h3>
									</header>
									<p>沒寫到信別擔心，
								來台大活動現場撿起有緣的漂流瓶，再到Mercury網站上給予溫馨或有趣的回應</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-comments"></span>
									<header>
										<h3>用文字經營得來不易的友情</h3>
									</header>
									<p>讓瓶子主人挑出最志同道合的回應，互相成為新朋友。Mercury瓶中信將是長久友誼的第一步！</p>
								</section>
							
							</div>
						</div>
							<ul class="buttons">
								<li><a href="<?php  echo "$fb_login_url"; ?>" class="button">寫下我的故事</a></li>
							</ul>
					</section>
					
				
					
			</article>

		<!-- CTA -->
			<section id="cta">
			
				<header>
					<h2><strong>Mercury</strong>是什麼?</h2>
					

							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
<hr>
<p>
Mercury瓶中信是個兼具隱私與驚喜的訊息系統，提供用戶更加自在的方式分享生活或抒發情感。 
<br>
把生活中的點滴，捲成匿名信、放進透明的玻璃瓶<br>
讓海浪替你找到共鳴，友誼長存。
</p>
<p>
Mercury瓶中信，收集各種不應沉沒的故事，讓漂流的心情不再寂寞。<br>

更多更有趣的新功能，即將推出，請關注我們<a href="https://www.facebook.com/mercurybottle?fref=ts">粉絲團</a>獲取最新消息</p>


				</header>

			
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
