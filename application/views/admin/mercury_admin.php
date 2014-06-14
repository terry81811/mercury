	<div class="well">
		<p style="text-align:right">
			<a href="/mercury_db">首頁</a> ｜ 
			<a href="/mercury_mail">寄信</a> ｜ 
			<a href="/mercury_db_story">故事</a> ｜ 
			<a href="/admin_api/admin_logout">登出</a>
		</p>
		<h1>Mercury後台，請勿將網址給團隊外部人士</h1>

	</div>


	<div class="well">

		<form class="form-inline" role="form" method="post" action="/admin_api/update_stories">
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputEmail2">優先分發少於</label>
		    <input name="threshold" type="text" class="form-control" id="exampleInputEmail2" placeholder="分發故事，撿起數少於">
		  </div>
		  <button type="submit" class="btn btn-primary">更新今日故事</button>
			<span>上次更新故事於 <?php echo $story_update_time;?></span>
		</form>
	<br>
		<form class="form-inline" role="form" method="post" action="/admin_api/new_stories">
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputEmail2">顯示未被回應的故事，編號小於..</label>
		    <input name="threshold" type="text" class="form-control" id="exampleInputEmail2" placeholder="顯示未被回應的故事">
		  </div>
		  <button type="submit" class="btn btn-default">顯示未被回應故事</button>
			<span>請輸入故事編號範圍小於..</span>
		</form>


		<h4><a class="btn btn-default" href="/admin_api/no_res_owner">顯示email（未回應的瓶主）</a><h4>

		<h4><a class="btn btn-default" href="/admin_api/no_res_user">顯示email（未回應撿到的故事）</a><h4>



	</div>
