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
			if (count($chatMessage)>0) {
				# have to return some chats
				/*$output = '';
				$output .= '<ul>';
				foreach ($chatMessage as $chatMsg) {
					$output .= '<li>';
					$output .= $chatMsg->chat_message_content;
					// var_dump($chatMsg->chat_message_content);
					$output .= '</li>';
					// array_push($result,  $chatMsg->user_id);
				}
				$output .= '</ul>';
				$result = array('status' => 'ok','content' => $output);
				echo json_encode($result);*/
				// $output .= "</ul>";
				// var_dump($chatMessage->result());
				$output = '';
				$output .= '<div class="item">';
				foreach ($chatMessage as $chatMsg) {
					if ($this->session->userdata('uid') == $chatMsg->user_id) {
					$output .= '<img id="chatImage" src="'.site_url('dist/img/user2-160x160.jpg').'" alt="user image" class="online" />';
					}else{
					$output .= '<img id="chatImage" src="'.site_url('dist/img/avatar3.png').'" alt="user image" class="online" />';
					}

					$output .= '<p class="message">';
					$output .= '<a href="#" class="name">';
					$output .= '<small class="text-muted pull-right"><i class="fa fa-clock-o"></i>'.$chatMsg->msg_create_date.'</small>';
					$output .= $chatMsg->firstName;
					$output .= '</a>';
					$output .= $chatMsg->chat_message_content;
					$output .= '</p>';
					// var_dump($chatMsg->chat_message_content);
					$output .= '</li>';
					// array_push($result,  $chatMsg->user_id);
				}
				$output .= '</div>';
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

	}
