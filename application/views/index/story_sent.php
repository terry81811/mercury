
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