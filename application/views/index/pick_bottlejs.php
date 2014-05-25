	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);

	    if(<? echo $is_reply?> == 0){
			alertify.success("您撿到了來自<?php echo $user_nickname?>的瓶中信，給一些回應吧！");
	    }

	$( "#pick_response" ).click(function() {

		alertify.set({ labels: {
		    ok     : "送出",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定送出回應給<?php echo $user_nickname?>？<br>提醒您，瓶中信只有一次回應機會<br>等到下次對方的回信上岸時才能再度回應", function (e) {
				if (e) {
					if($("#response_content").val().length > 1){
						alertify.success("正在送出回應...");
						$('#response_form').submit();
					}else{
						alertify.error("小提醒，請再充實回應內容唷");
					}
				} else {
					alertify.error("回應尚未送出");
				}
			});
			return false;


	});


	    if(<? echo $waiting_reply?> == 1){
			$('#response_form').hide();
	    }


	</script>