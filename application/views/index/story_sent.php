
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
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


						<li><a href="<?php echo "$login_logout_url"; ?>" class="button special"><?php echo $login_logout_text;?> </a></li>
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
					<p>你的漂流瓶已經隨海浪遠去<br/>每日24:00，瓶中信會靠岸在某人身邊<br>而我們可以做的，就是等待回信
					<footer>
					<ul class="buttons">
						<li><a href="/write_story" class="button special">送出下一封瓶中信</a></li>
						<li><a href="/my_bottles" class="button">看我的故事</a></li>
					</ul>
					</footer>
				
				</div>
				
			</section>
		

	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);
	</script>

	</body>
