<?php

	class Chat extends Engineer_Controller{
		public function __constructor(){
			parent::__constructor();
		}

		public function index(){
			// $this->data['projects'] = $this->project_m->getAllProjects();
			$this->data['subview'] = 'engineer/user/chat';
			$this->load->view("engineer/_layout_main",$this->data);
		}

		public function ajaxAddChatMessage(){
			$chat_id = $this->input->post('chat_id');
			$user_id = $this->session->userdata('uid');//$this->input->post('user_id');
			$chat_message_content = $this->input->post('chatMessageContent');
			// var_dump($chat_message_content);
			$this->chat_m->addChatMessage($chat_id,$user_id,$chat_message_content);
		}

		public function ajaxGetChatMessage(){
			$chat_id = $this->input->post('chat_id');
			$chatMessage = $this->chat_m->getChatMessage($chat_id);
			// var_dump($chatMessage);
			if ($chatMessage->num_rows()>0) {
				# have to return some chats
				$output = "";
				$output .= "<ul>";
				foreach ($chatMessage->result() as $chatMsg) {
					$output .= "<li>";
					$output .= $chatMsg->chat_message_content;
					// var_dump($chatMsg->chat_message_content);
					$output .= "</li>";
				}
				$output .= "</ul>";
				// var_dump($chatMessage->result());
				$result = array('status' => 'ok','content' => $output);
				echo json_encode($result);
				exit();

			}else{
				# no chats
				$result = array('status' => 'ok','content' => '');
				echo json_encode($result);
				exit();
			}
		}

	}
