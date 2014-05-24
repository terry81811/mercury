	<div class="well">
		<p style="text-align:right"><a href="/mercury_mail">寄信</a> ｜ <a href="/mercury_db_story">故事</a> ｜ <a href="/admin_api/admin_logout">登出</a></p>
		<h1>Mercury後台，請勿將網址給團隊外部人士</h1>

	</div>




	<form class="form-horizontal" role="form" style="width:500px;margin:auto auto" action="/api/email_api" method="post">
	<h4>Mercury信件系統</h4>


  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">收件人</label>
    <div class="col-sm-10">
		<label class="checkbox-inline">
		  <input type="radio" class="other-def" value="all" name="email_type" checked> 全部用戶
		</label>
    <label class="checkbox-inline">
      <input type="radio" class="other-def" value="write-user" name="email_type" checked> 已寫信用戶
    </label>
		<label class="checkbox-inline">
		  <input type="radio" class="other-def" value="active-user" name="email_type"> 活躍用戶
		</label>
		<label class="checkbox-inline">
		  <input type="radio" class="other-def" value="inactive-user" name="email_type"> 不活躍用戶
		</label>
		<label class="checkbox-inline">
		  <input type="radio" class="self-def" value="self-def" name="email_type"> 自定
		</label>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">自定收件人</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="self-def-input" placeholder="Email@gmail.com" name="email_to" disabled>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">主旨</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="email_subject">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">內文</label>
    <div class="col-sm-10">
		<textarea class="form-control" rows="5" name="email_message"></textarea>
    </div>
  </div>



  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="email_to_mercury" class="disable"> 發送備份信給mercury
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="list_receiver"> 顯示收件清單（不會寄出信）
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">送出</button>
    </div>
  </div>
</form>



