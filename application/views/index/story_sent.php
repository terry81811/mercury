<!DOCTYPE HTML>
<!--
	Twenty 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Mercury瓶中信</title>
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
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信</span></a></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="/">Welcome <?php echo $user_name;?></a></li>

						<?php

						?>

						<li><a href="<? echo "$login_logout_url"; ?>" class="button special">Sign Up</a></li>
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
					
					<header>
						<h2>Mercury</h2>
					</header>
					<p>你的漂流瓶已經隨海浪遠去<br/>5/19日請回到這裡，等待回音
					<footer>
					<ul class="buttons">
						<li><a href="/write_story" class="button special">送出下一封瓶中信</a></li>
						<li><a href="/" class="button">回首頁</a></li>
					</ul>
					</footer>
				
				</div>
				
			</section>
		

	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);
	</script>

	</body>
</html>