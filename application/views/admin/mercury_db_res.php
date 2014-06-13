	<div class="well">
		<p style="text-align:right"><a href="/mercury_mail">寄信</a> ｜ <a href="/mercury_db_story">故事</a> ｜ <a href="/admin_api/admin_logout">登出</a></p>
		<h1>Mercury後台，請勿將網址給團隊外部人士</h1>

	</div>


	<div class="well">

	<h2>使用人數：</h2>
	<h4>男：<?php echo $male_count;?> 女：<?php echo $female_count;?></h4>

	    <table class="table table-condensed" style="margin-bottom:0px;">
		<tr>
			<td width='4%'>ID</td>
			<td width='5%'>登入次數</td>
			<td width='10%'>姓名</td>
			<td width='10%'>學校</td>
			<td width='10%'>系級</td>
			<td width='5%'>送出故事</td>
			<td width='5%'>撿起故事</td>
			<td width='5%'>回應數</td>
			<td width='5%'>被回應</td>
			<td width='10%'>最後上線</td>
		</tr>
		<pre>
	    			<?php
						foreach ($users as $_key => $user) {
							echo "<tr>";
							echo "<td>".$user['user_id']."</td>";
							echo "<td>".$user['user_login_count']."</td>";
							echo "<td>".$user['user_name']."</td>";
							echo "<td>".$user['user_school']."</td>";
							echo "<td>".$user['user_department']."</td>";
							echo "<td>".$user['stories']."</td>";
							echo "<td>".$user['picks']."</td>";
							echo "<td>".$user['replies']."</td>";
							echo "<td>".$user['replies_to']."</td>";
							echo "<td>".$user['user_update_time']."</td>";
							echo "</tr>";
						}
	    			?>
</pre>
		</table>


	</div>
