
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="/">Mercury <span>瓶中信 </span></a><span class="icon fa-envelope"> 我撿過的瓶子</span></h1>
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

		<!-- Banner -->		
			<section id="banner-fix">
				
				<header class="container">
							<p style="font-style:italic; font-size:16px; font-weight:300;">“ 據說，有一片Mercury海<br>把你的心事、秘密放入瓶中，投進海裡，就可以收到回信。<br>
					你不知道信從何而來，也不知道瓶子飄向何處... ”</p>
				</header>

<?php
?>

				<?php foreach ($picked_story as $_key => $story) { ?>
					<section  id="letter-background" class="content wrapper style2 special container small" style="margin:1em auto">	
						<!-- Content -->
						<div class="12u">
				<?php	
						if($story['new_reply'] > 0){
							echo '<span class="" style="font-size:16px; font-weight:300; color:rgb(100,100,70)">  <i class="fa fa-envelope"></i> New </span>';
						}
						echo '<p class="story_content letter-content limit-letter-content">'.str_replace("\n","<br>",$story['story_content']).'</p>';?>
								<span class="letter-content" style="font-size:13px; font-weight:300;">
								<a href="/bottles/<?php echo $story['story_id']?>">繼續閱讀/回覆...</a></span>		
							<p class="story_footer letter-content" style="text-align:right;">
								<span style="font-size:13px; font-weight:300;">
								</span>
								<?php echo $story['user_nickname'].' 於 '.date("m-d-Y",strtotime($story['story_time'])).'<span class="story_code"> #'.$story['story_code'].'<br></span>'?>
						
							</p>
						</div>							
					</section>

				<?php }?>
				



		<!-- Footer -->
					<ul class="buttons">
						<li><a target="_blank" href="https://www.facebook.com/mercurybottle?fref=ts" class="button special">facebook粉絲頁</a></li>
						<li><a href="#" class="button">聯絡我們</a></li>
					</ul>

				<span class="copyright">&copy; Mercury. All rights reserved. Design: HTML5 UP</span>				
		

			</section>
		
	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);
	</script>

	</body>
