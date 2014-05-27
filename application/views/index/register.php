
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
					<h2>歡迎來到Mercury</h2><h3>寫下你的故事，漂向遠方</h3>
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
				</header>
					
				<!-- One -->
					<section class="wrapper style4 special container small">
					
						<!-- Content -->
							<div class="content">
								<h3>簡單的註冊，開始使用Mercury瓶中信</h3>
								<form id="register_form" method="post" action="/api/register">

									<div class="row half">
										<div class="12u">
											<input id="hidden_story_question" name="user_email" type="email" value="" placeholder="常用電子郵件信箱：example@gmail.com" required>
										</div>
									</div>
									<div class="row half no-collapse-1">
										<div class="4u">
											<input type="text" name="user_school" placeholder="學校" required>
										</div>
										<div class="4u">
											<input type="text" name="user_department" placeholder="科系" required>
										</div>
										<div class="4u">
											<input type="text" name="user_nickname" placeholder="我的筆名" required>
										</div>
									</div>

									<div class="row">
										<div class="12u">
											<p style="font-size:14px;">除了校系、筆名外我們不會透漏您的任何資訊<br>校系與筆名一經設定，無法更改</p>											
											<ul class="buttons">
												<li><button type="submit" id="register_send_btn" href="#" class="button special">送出</button></li>
											</ul>
										</div>
									</div>

								</form>
							</div>
							
					</section>

			</article>

			<footer id="footer">

					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a href="#" class="button">聯絡我們</a></li>
					</ul>
				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				

			</footer>



<script>



</script>

	</body>
