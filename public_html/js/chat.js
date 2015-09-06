// jQuery.noConflict();

$(document).ready(function(){

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

		},'json');
	});
	// $("#send").html("Hello World");
	function getChatMessage(){
		$.post(base_url+'engineer/chat/ajaxGetChatMessage',{chat_id:chat_id},function(data){
			if(data.status == 'ok'){
				$('div#view').html(data.content);
			}
		},'json');
		// alert(base_url+'chat/ajaxGetChatMessage');
	}
	getChatMessage();
});

