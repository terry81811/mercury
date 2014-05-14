	<div class="well">
		<p style="text-align:right"><a href="/mercury_db">使用者</a> ｜ <a href="/admin_api/admin_logout">登出</a></p>
		<h1>Mercury後台，請勿將網址給團隊外部人士</h1>

	</div>


	<div class="well">

	<h2>使用人數：</h2>
	<h4>男：<?php echo $male_count;?> 女：<?php echo $female_count;?></h4>

	    <table class="table table-condensed" style="margin-bottom:0px;">
		<tr>
			<td width='5%'>發信人</td>
			<td width='5%'>筆名</td>
			<td width='15%'>主旨</td>
			<td width='20%'>內容</td>
			<td width='5%'>對應code</td>
			<td width='10%'>送出時間</td>
		</tr>
		<pre>
	    			<?php
						foreach ($stories as $_key => $story) {
							echo "<tr>";
							echo "<td>".$story['story_writer']."</td>";
							echo "<td>".$story['story_writer_nickname']."</td>";
							echo "<td>".$story['story_subject']."</td>";
							echo "<td>".$story['story_content']."</td>";
							echo "<td>".$story['story_code']."</td>";
							echo "<td>".$story['story_time']."</td>";
							echo "</tr>";
						}
	    			?>
</pre>
		</table>


	</div>
