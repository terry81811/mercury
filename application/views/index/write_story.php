
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
										<h3>5/12-23 寫下你的故事</h3>
									</header>
									<p>在Mercury網站寫下想說的心事， Mercury會把它變成<strong>實體瓶中信</strong>。寫信不只能抽到實體禮物，還能收到最溫暖的回應。</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-users"></span>
									<header>
										<h3>5/26-30 撿起別人的瓶中信</h3>
									</header>
									<p>不論妳有沒有寫信，5/26-30
								來台大撿起別人的故事，再到Mercury網站上輸入瓶子代號，給予瓶子主人溫馨或有趣的回應</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-comments"></span>
									<header>
										<h3>用文字經營得來不易的友情</h3>
									</header>
									<p>瓶子的主人5/26後將可以在Mercury網站上挑出最感動的那一則，互相成為新朋友。Mercury瓶中信將是長久友誼的第一步！</p>
								</section>
							
							</div>
						</div>
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
