
<script>
var questions = [
	"<br>有人說，「攝影就是捕捉生活裡的感動及想法<br>文字則是補充影像無法描述的情感」<br>有人則說，「攝影就像是將時間軸凝結成一個點<br>文字則是將一個時間點拉成一個軸」<br><br>你怎麼說呢？攝影和文字對於你又有什麼樣的想法與看法？",
	"<br>給你我所能給的，並且等待你的拒絕<br>流淚，是我想你時唯一的自由<br>———劇作《臺北詩人》<br><br>好像曾經有這麼樣一個人，是放在你內心深處的，<br>很愛，卻不得不放手，那一種灌注生命的愛。 <br>有人這樣說：忘記一個人最好的方法，就是將他變成文字。<br><br>寫下那一段你刻骨銘心的感情吧，也許可以在瓶中信內找到共鳴，而更勇敢的往前進。",
	"<br>「 I thought our relationship was perfectly clear. <br>You are an escape. You're a break from our normal lives. 」<br>型男飛行日記裡，艾克絲對雷恩說。<br><br>也許生活中曾經有那麼一個人，你知道你們不會在一起，你知道你們不可能在一起。<br>你們彼此間的關係就是純粹的愛而已，那樣不加入雜質的愛，彼此是對方的精神支柱，<br>就因為不會在一起，就因為不會註定要離開，所以可以永遠保持著這樣的關係，曖昧卻純粹，所以更是彼此內心的escape。<br><br>你有沒有那樣一位對象，雖然沒有在一起，可是卻在你的心中佔了一個很重要的地位？",
	"<br>我們都很有默契的，一起等待開花結果，卻又不敢說出口<br>曖昧的過程中，是沈靜在其中的氛圍；或是期待下一個階段的開始<br>有些人曖昧了十年卻始終是朋友，又有些人花了短短一天便告白成功<br><br>對你來說，曖昧的感覺是什麼？",
	"<br>陽光灑下的午後，微風徐徐的寧靜<br>有沒有這樣一間自己秘密的小店<br>可以聽著音樂，綴著咖啡，也許翻一本隨手捻來的小說<br>就這樣享受一下午的悠閒，在忙碌生活中放慢步調找那一個小確幸。<br><br>分享一下吧！有沒有自己很喜歡的小店呢？也許會在那邊不期而遇一位新朋友噢！:)",
	"<br>禮物代表了人們對於一個人感謝，也是一整份心意，更充滿了紀念與期許。<br>我們總是希望收到別出心裁、感到驚喜的禮物，甚至是出乎我們預料之外的。<br><br>你曾經收過什麼感動、驚喜的禮物嗎？為什麼？說說那一份禮物的感動與故事吧！",
	"<br>寵物也許是你生活中的一部份，但是對牠來說，你卻是牠的一生。<br>你有養寵物嗎？寵物一定會為生活造成歡笑與淚水吧！<br>說一說你和牠的故事吧！",
	"<br>每一次的旅行，都是嶄新不同的故事。<br>有些人可以在旅途中獲得全新的能量，有些人則在旅程中學到怎麼去包容不同的文化。<br>你呢？你有沒有一次最深刻的旅行？"
	];

		var item = questions[Math.floor(Math.random()*questions.length)];
		$("#hidden_story_question").val(item);
		$("#story_question").html(item);

	$( "#change_question" ).click(function() {
		var item = questions[Math.floor(Math.random()*questions.length)];
		$("#hidden_story_question").val(item);
		$("#story_question").html(item);
	});

	$( "#story_send_btn" ).click(function() {

		alertify.set({ labels: {
		    ok     : "確認",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定送出？<br>提醒您，瓶中信送出後將無法修改。", function (e) {
				if (e) {
					if($("#story_content").val().length > 10){
						alertify.success("正在送出瓶中信...");
						$('#story_form').submit();
					}else{
						alertify.error("小提醒，請再充實文章內容唷");
					}

				} else {
					alertify.error("瓶中信尚未送出");
				}
			});
			return false;


	});

// Custom Themes
//$("#toggleCSS").attr("href", "../assets/twenty/css/style.css");
//$("#toggleCSS").attr("href", "../assets/css/alertify/alertify.bootstrap.css");
//$("#toggleCSS").attr("href", "../assets/css/alertify/alertify.custom.css");


//alertify.log("Notification", "", 0);

</script>
