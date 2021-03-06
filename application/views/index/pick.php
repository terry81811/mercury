
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
			<section id="banner">
				
				<header class="special container">
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
				</header>
						<!-- Content -->
							<div class="content wrapper style1 special container small">


									<div class="row half">



										<div class="4u">
											<section>
												<a href="/bottles"><span style="color:white;" class="icon fa-5x fa-inbox"></span></a>
												<header>
													<h3><a href="/api/pick_today">查看之前的瓶中信</a></h3>
												</header>
												<p style="font-size:14px;">遠方的人還在等待你的回應</p>
												
											</section>
										</div>
										<div class="4u">
											<section>
												<a href="/api/pick_today"><span style="color:white;" class="icon fa-5x fa-envelope"></span></a>
												<header>
													<h3><a href="/api/pick_today">撿取今日的瓶中信</a></h3>
												</header>
												<p style="font-size:14px;">過了今天，再也沒有機會撿到同樣的故事</p>
												
											</section>
										</div>

										<div class="4u">
											<section>
												<a href="#" id="enter_code_btn"><span style="color:white;" class="icon fa-5x fa-pencil-square"></span></a>
												<header>
													<h3><a href="#" id="enter_code">輸入實體漂流瓶代碼</a></h3>
												</header>
														<form id="code_form" action="/api/enter_code" method="post">
														    <div class="input-group" style="width:100%;margin:auto auto;">
														      <input style="background-color:rgba(255,255,255,0.8);color:black" type="text" class="form-control" name="code" placeholde="請輸入code">
														      <span class="input-group-btn">
														        <button class="btn btn-default" type="submit"><span style="" class="icon fa-envelope"></span></button>
														      </span>
														    </div><!-- /input-group -->
														</form>
															<p style="font-size:13px; font-weight:300;">請輸入5/26-30在實體瓶中信活動中的信件代碼</p>
											</section>
										</div>

									</div>


							</div>
				
			</section>
		
		<!-- Main -->
			<article id="main">

				<header class="special container" style="padding-top:0px;">


					<img style="max-width:45px;" src="../assets/img/bottle.png" alt="">
					<h2>厭倦了過於直接的速食交友？來交筆友吧</h2>
					<p>或許我們可以先從身邊的朋友開始，透過文字重新認識他們<br>又或者是從生活圈相近但不曾見面的人，同學？同事？朋友的朋友？
						<br><a href="<?php  echo "$fb_login_url"; ?>">寫下你的故事</a>，放入漂流瓶，等待被撿起的那一天</p>
				</header>

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


		<!-- Footer -->
			<footer id="footer">
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a class="button" target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=http://mercury.so">分享給FACEBOOK朋友</a>						
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
		
			</footer>


	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);
	</script>

	</body>
