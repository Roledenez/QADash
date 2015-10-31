<?php

/***
 * @author : Roledene
 * Type : class
 * Name : Chat
 * Description : This class handle all the Chat related activities
 */
	class Chat extends Engineer_Controller{
		/**
		 * @author : Roledene
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default constructor of chat class
		 */
		public function __constructor(){
			parent::__constructor();
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : index
		 * Description : This function redirect user to chat UI
		 */
		public function index(){
			// $this->data['projects'] = $this->project_m->getAllProjects();
			$this->data['subview'] = 'engineer/user/chat';
			$this->session->set_userdata('lastChatId_1',0);
			$this->load->view("engineer/_layout_main",$this->data);
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : ajaxAddChatMessage
		 * Description : This function add a chat message to chat box
		 */
		public function ajaxAddChatMessage(){
			$chat_id = $this->input->post('chat_id');
			$user_id = $this->session->userdata('uid');//$this->input->post('user_id');
			$chat_message_content = $this->input->post('chatMessageContent');
			// var_dump($chat_message_content);
			$this->chat_m->addChatMessage($chat_id,$user_id,$chat_message_content);

			echo $this->_ajaxGetChatMessage($chat_id);
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : _ajaxGetChatMessage
		 * @param int $chat_id the string to quote
		 * @return string return the result as html elements
		 * Description : This function get the chat messages relevant to particular use bind it to html elements and return it as a string
		 */
		public function _ajaxGetChatMessage($chat_id)
		{
			$lastChatMsgId = (int)$this->session->userdata('lastChatId_' . $chat_id);
			$chatMessage = $this->chat_m->getChatMessage($chat_id, $lastChatMsgId);
			// var_dump($chatMessage);
			if (count($chatMessage) > 0) {
				// store the last chat message id
				// var_dump($chatMessage);
				$lastChatMsgId = $chatMessage[count($chatMessage) - 1]->chat_id;
				$this->session->set_userdata('lastChatId_' . $chat_id, $lastChatMsgId);
				$output = '';
				$output .= '<div class="item">';
				foreach ($chatMessage as $chatMsg) {
					if ($this->session->userdata('uid') == $chatMsg->user_id) {
						$output .= '<img id="chatImage" src="' . site_url('dist/img/user2-160x160.jpg') . '" alt="user image" class="online" />';
					} else {
						$output .= '<img id="chatImage" src="' . site_url('dist/img/avatar3.png') . '" alt="user image" class="online" />';
					}

					$output .= '<p class="message">';
					$output .= '<a href="#" class="name">';
					$output .= '<small class="text-muted pull-right"><i class="fa fa-clock-o"></i>' . $chatMsg->msg_create_date . '</small>';
					$output .= $chatMsg->firstName;
					$output .= '</a>';
					$output .= $chatMsg->chat_message_content;
					$output .= '</p>';
					// var_dump($chatMsg->chat_message_content);
					$output .= '</li>';
					// array_push($result,  $chatMsg->user_id);
				}
				$output .= '</div>';
				$result = array('status' => 'ok', 'content' => $output);
				return json_encode($result);
				exit();

			} else {
				# no chats
				$result = array('status' => 'ok', 'content' => '');
				return json_encode($result);
				exit();
			}
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : ajaxGetChatMessage
		 * @deprecated Method deprecated in Release 2.0.0
		 * Description : This function get the chat messages and print it in plan html doc
		 */
		public function ajaxGetChatMessage(){
			$chat_id = $this->input->post('chat_id');
			echo $this->_ajaxGetChatMessage($chat_id);
		}

		function objectToArray($data)
		{
		    if (is_array($data) || is_object($data))
		    {
		        $result = array();
		        foreach ($data as $key => $value)
		        {
		            $result[$key] = $this->objectToArray($value);
		        }
		        return $result;
		    }
		    return $data;
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : getUnreadChats
		 * Description : This function get the unread chat messages count in logged in user and print it in plan html in json format
		 */
		function getUnreadChats()
		{
			$chat = new chat_m();
			echo $chat->getUnreadChats();
		}

	}
