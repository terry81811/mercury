	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);



	$( "#suggest_btn" ).click(function() {

		alertify.set({ labels: {
		    ok     : "送出",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定送出訊息給Mercury？", function (e) {
				if (e) {

					if($("#suggest_content").val().length > 1){
						alertify.success("訊息正在傳送...");
						$('#suggest_form').submit();
					}else{
						alertify.error("小提醒，請再充實內容唷");
					}

				} else {
					alertify.error("尚未送出");
				}
			});
			return false;


	});


	</script>