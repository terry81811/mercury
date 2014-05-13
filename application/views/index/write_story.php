
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
					<p><span id="story_question">你相信異性間有純友誼嗎？</span>
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
											<textarea name="story_content" placeholder="給撿到瓶子的你，我..." rows="7"></textarea>
										</div>
									</div>
									<div class="row half no-collapse-1">
										<div class="4u">
											<input type="text" name="user_school" placeholder="學校" />
										</div>
										<div class="4u">
											<input type="text" name="user_department" placeholder="科系" />
										</div>
										<div class="4u">
											<input type="text" name="user_nickname" placeholder="我的筆名" />
										</div>
									</div>

									<div class="row">
										<div class="12u">
											<p style="font-size:14px;">除了校系、筆名外我們不會透漏您的任何資訊<br>提醒您：越真摯的內容，越有機會讓撿到瓶子的人感動而回信</p>											
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
										<h3>5/12-16 寫下你的故事</h3>
									</header>
									<p>在Mercury網站寫下想說的心事， Mercury會把它變成<strong>實體瓶中信</strong>。寫信不只能抽到實體禮物，還能收到最溫暖的回應。</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-users"></span>
									<header>
										<h3>5/19-23 撿起別人的瓶中信</h3>
									</header>
									<p>不論妳有沒有寫信，5/19-23
								來台大撿起別人的故事，再到Mercury網站上輸入瓶子代號，給予瓶子主人溫馨或有趣的回應</p>
								</section>
							
							</div>
							<div class="4u">
							
								<section>
									<span class="icon feature fa-comments"></span>
									<header>
										<h3>用文字經營得來不易的友情</h3>
									</header>
									<p>瓶子的主人5/19後將可以在Mercury網站上挑出最感動的那一則，互相成為新朋友。Mercury瓶中信將是長久友誼的第一步！</p>
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



<script>


var questions = [
	"你相信異性間有純友誼嗎？",
	"你會和好朋友的前男/女朋友交往嗎？",
	"小說，還是電影更會讓你沉迷？",
	"對你來說，筆友是什麼？",
	"你從別人口中得知最好的朋友一直以來都默默喜歡你，你會...？",
	"單身是因為不夠勇敢不夠積極嗎？",
	"曖昧的感覺是什麼？你喜歡嗎？",
	"你想收到什麼禮物？",
	"最近做了什麼夢？",
	"對你來說，什麼是溫柔體貼？",
	"最喜歡的一首歌？背後有什麼故事？",
	"喜歡一個人去旅行還是結伴同遊呢？",
	"人生最奇怪的夢想是什麼？",
	"最近有看什麼電影嗎？有什麼心得？",
	"跟遠方的朋友分享一本最近看的好書吧",
	"每一次旅行，都是一個不同的故事。你有沒有最深刻的旅行經驗想要分享？",
	"你發生過最糗的事是？",
	"每次好朋友生日都要精心設計。有沒有特別自豪、想與人分享的整人驚喜呢？",
	"有沒有一個心情或情緒是無法跟身邊任何一個人分享的？"

];

		var item = questions[Math.floor(Math.random()*questions.length)];
		$("#hidden_story_question").val(item);
		$("#story_question").text(item);

	$( "#change_question" ).click(function() {
		var item = questions[Math.floor(Math.random()*questions.length)];
		$("#hidden_story_question").val(item);
		$("#story_question").text(item);
	});

	$( "#story_send_btn" ).click(function() {
		$("#story_form").submit();
	});


</script>

	</body>
