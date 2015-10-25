// jQuery.noConflict();

$(document).ready(function(){

	setInterval(function(){getChatMessage()},2000)

	$("input#input").keypress(function(e){
		if(e.which == 13){
			$("button#send").click();
			return false;
		}
	});
	// alert('we made it');
	// console.log('hello chat');
	$("button#send").click(function(){
	var chatMessageContent = $("input#input").val();
	// alert(chatMessageContent);
		if(chatMessageContent == ""){return false;}
		// console.log("before post");
		// console.log(base_url);

		$.post(base_url+"engineer/chat/ajaxAddChatMessage",{chatMessageContent:chatMessageContent,chat_id:chat_id},function(data){
			// console.log("after post");
			// console.log(data);
			$('div#chat-box').html(data.content);
		},'json');
		$("input#input").val("");
	});
	// $("#send").html("Hello World");
	function getChatMessage(){
		$.post(base_url+'engineer/chat/ajaxGetChatMessage',{chat_id:chat_id},function(data){
				// var currentContent = $('div#chat-box').html();
				$('div#chat-box').html(data.content);
				// $('span#chatMessage').html(data[0].chat_message_content);
				// alert(data[0].chat_message_content);

		},'json');
		// alert(base_url+'chat/ajaxGetChatMessage');
	}
	getChatMessage();
});

