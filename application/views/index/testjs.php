	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);

if(<?php echo $notification_owner?> > 0){
	alertify.success("您共有<?php echo $notification_owner?>個送出的故事在等待您的回覆，趕快去回覆他們吧！");
}

if(<?php echo $notification_picker?> > 0){
	alertify.error("您共有<?php echo $notification_picker?>個撿到的故事在等待您的回覆，趕快去回覆他們吧！");
}

	</script>