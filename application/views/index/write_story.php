<!DOCTYPE HTML>
<!--
	Twenty 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Mercury漂流瓶</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="../assets/twenty/js/jquery.min.js"></script>
		<script src="../assets/twenty/js/jquery.dropotron.min.js"></script>
		<script src="../assets/twenty/js/skel.min.js"></script>
		<script src="../assets/twenty/js/skel-layers.min.js"></script>
		<script src="../assets/twenty/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="../assets/twenty/css/skel.css" />
			<link rel="stylesheet" href="../assets/twenty/css/style.css" />
			<link rel="stylesheet" href="../assets/twenty/css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body class="contact loading">
	
		<!-- Header -->
			<header id="header">
				<h1 id="logo"><a href="/">Mercury <span>漂流瓶</span></a></h1>
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
					<h2>Mercury - 寫下你的故事，飄向遠方</h2>
					<p><span id="story_question">你相信異性間有純友誼嗎？</span>
						<a id="change_question" href="#" style="border:0px;"><i class="fa fa-refresh fa-spin"></a></i></p>
				</header>
					
				<!-- One -->
					<section class="wrapper style4 special container small">
					
						<!-- Content -->
							<div class="content">
								<form method="post" action="/api/write_story">

									<div class="row half">
										<div class="12u">
											<textarea name="message" placeholder="給撿到瓶子的你，我..." rows="7"></textarea>
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
												<li><a href="#" class="button special">送出漂流瓶</a></li>
											</ul>
										</div>
									</div>

								</form>
							</div>
							
					</section>
				
			</article>

			<footer id="footer">
					<p style="font-size:14px;">投出的瓶子，會在5/19-23出現在台大醉月湖邊等待有緣的人<br>而寫下故事的你，將於5/19日以後回到Mercury，等待遠方的回信</p>
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a href="#" class="button">聯絡我們</a></li>
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>				
			</footer>



<script>

var questions = [
	"你相信異性間有純友誼嗎？",
	"你會和好朋友的前男/女朋友交往嗎？",
	"小說，還是電影更會讓你沉迷？",
	"對你來說，筆友是什麼？",
	"你從別人口中得知最好的朋友一直以來都默默喜歡你，你會...？"
];
	$( "#change_question" ).click(function() {
		var item = questions[Math.floor(Math.random()*questions.length)];
		$("#story_question").text(item);
	});
</script>

	</body>
</html>