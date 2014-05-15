
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
											<textarea name="story_content" placeholder="給撿到瓶子的你，我..." rows="7"></textarea>
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



<script>


var questions = [
	"<br>有人說，「攝影就是捕捉生活裡的感動及想法<br>文字則是補充影像無法描述的情感」<br>有人則說，「攝影就像是將時間軸凝結成一個點<br>文字則是將一個時間點拉成一個軸」<br><br>你怎麼說呢？攝影和文字對於你又有什麼樣的想法與看法？",
	"<br>給你我所能給的，並且等待你的拒絕<br>流淚，是我想你時唯一的自由<br>———劇作《臺北詩人》<br><br>好像曾經有這麼樣一個人，是放在你內心深處的，<br>很愛，卻不得不放手，那一種灌注生命的愛。 <br>有人這樣說：忘記一個人最好的方法，就是將他變成文字。<br><br>寫下那一段你刻骨銘心的感情吧，也許可以在瓶中信內找到共鳴，而更勇敢的往前進。",
	"<br>「 I thought our relationship was perfectly clear. <br>You are an escape. You're a break from our normal lives. 」<br>型男飛行日記裡，艾克絲對雷恩說。<br><br>也許生活中曾經有那麼一個人，你知道你們不會在一起，你知道你們不可能在一起。<br>你們彼此間的關係就是純粹的愛而已，那樣不加入雜質的愛，彼此是對方的精神支柱，<br>就因為不會在一起，就因為不會註定要離開，所以可以永遠保持著這樣的關係，曖昧卻純粹，所以更是彼此內心的escape。<br><br>你有沒有那樣一位對象，雖然沒有在一起，可是卻在你的心中佔了一個很重要的地位？",
	"<br>我們都很有默契的，一起等待開花結果，卻又不敢說出口<br>曖昧的過程中，是沈靜在其中的氛圍；或是期待下一個階段的開始<br>有些人曖昧了十年卻始終是朋友，又有些人花了短短一天便告白成功<br><br>對你來說，曖昧的感覺是什麼？",
	"<br>陽光灑下的午後，微風徐徐的寧靜<br>有沒有這樣一間自己秘密的小店<br>可以聽著音樂，綴著咖啡，也許翻一本隨手捻來的小說<br>就這樣享受一下午的悠閒，在忙碌生活中放慢步調找那一個小確幸。<br><br>分享一下吧！有沒有自己很喜歡的小店呢？也許會在那邊不期而遇一位新朋友噢！:)"
	];

		var item = questions[Math.floor(Math.random()*questions.length)];
		$("#hidden_story_question").val(item);
		$("#story_question").html(item);

	$( "#change_question" ).click(function() {
		var item = questions[Math.floor(Math.random()*questions.length)];
		$("#hidden_story_question").val(item);
		$("#story_question").html(item);
	});

	$( "#story_send_btn" ).click(function() {
		$("#story_form").submit();
	});


</script>

	</body>
