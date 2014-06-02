<script>
	

function getId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length >= 11) {
        return match[2].slice(0,11);
    } else {
        return 0;
    }
}

function getText() {

}

var letter_text = $('.letter_text');


//alert(letter_content.length);

//alert(letter_content);

//alert(typeof(letter_content));

letter_text.each(function() {

	var ID = getId($(this).html());

	if(ID != 0){
		$(this).append('<iframe width="100%" height="400px" src="//www.youtube.com/embed/' + ID + '" frameborder="0" allowfullscreen></iframe>');
	}

});

</script>