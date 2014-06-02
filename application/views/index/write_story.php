
	<body class="contact loading">
	
		<!-- Header -->
		<!-- Header -->
			<header id="header">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信 </span></a><span class="icon fa-envelope"> 寫。故事</span></h1>
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


	
		<!-- Main -->
			<article id="main">

				<header class="special container">
					<span class="icon fa-envelope"></span>
					<h2>Mercury - 寫下你的故事，漂向遠方</h2>
					<p style="font-size:14px;">請寫下任何你想寫的話，或是從下面的問題找靈感？</p>
					<p><span id="story_question" style="font-size:14px;font-style:italic;"></span>
						<a id="change_question" href="#" style="border:0px;"><i class="fa fa-refresh fa-spin"></a></i></p>
				</header>
					
				<!-- One -->
					<section class="wrapper style4 special container small">
					
						<!-- Content -->
							<div class="content">
								<form id="story_form" method="post" action="/api/write_story">

									<div class="row half">
										<div class="12u">
											<input id="hidden_story_question" name="story_subject" type="hidden" value="">
											<textarea id="story_content" name="story_content" placeholder="給撿到瓶子的你，我..." rows="7" required></textarea>
										</div>
									</div>

									<div class="row">
										<div class="12u">
											<ul class="buttons">
												<li><a id="story_send_btn" href="#" class="button special">送出漂流瓶</a></li>
											</ul>
										</div>
									</div>

								</form>
							</div>
							
					</section>
					
					<!-- Two -->
					<section class="wrapper style1 container special">
						<div class="row">
							<div class="4u">
							
								<section>
									<span class="icon feature fa-pencil"></span>
									<header>
										<h3>寫下你的故事</h3>
									</header>
									<p>在這裡寫下任何想說的心情， Mercury就會幫你傳遞您的瓶中信，傳遞給即將認識的新朋友！只要夠真心誠意，就能收到最溫暖的回應。</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-users"></span>
									<header>
										<h3>撿起別人的漂流瓶</h3>
									</header>
									<p>每天都可以撿起一封有緣的漂流瓶，撿起之後給予最真心的回饋。</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-comments"></span>
									<header>
										<h3>用文字經營得來不易的友情</h3>
									</header>
									<p>讓瓶子主人挑出志同道合的回應，互相聊天成為新朋友。Mercury瓶中信將是長久友誼的第一步！</p>
								</section>
							
							</div>
						</div>
							<ul class="buttons">
								<li><a href="/write_story" class="button">寫下我的故事</a></li>
							</ul>
					</section>
					
			</article>

			<footer id="footer">
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a href="#" class="button">聯絡我們</a></li>
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
			</footer>

	</body>
