	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);



	$( "#pick_response" ).click(function() {

		alertify.set({ labels: {
		    ok     : "送出",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定送出回應給<?php echo $reply_nickname?>？", function (e) {
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



	</script>