<?php
		/*
		 * Auther : Roledene
		 * Type : class
		 * Name : chat_m
		 * Description : This class represent the chat model
		 */
	class chat_m extends My_Model{
		protected $_table_name = "chat_messages";
		protected $_order_by = "";
		// rules for the login imput fields

		protected $_timestamps = FALSE;

		/*
		 * Auther : Roledene
		 * Type : constructor
		 * Name : __construct
		 * Description : Default construtor for chat_m class
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : addChatMessage
		 * Description : This method add a chat message to database
		 */
		public function addChatMessage($chatId,$userId,$chatMessageContent){
			$this->chat_m->_table_name = "chat_messages";
			$this->chat_m->_primary_key = "chat_message_id";

			$id = $this->save(array(
				'chat_id' => $chatId,
				'user_id' => $userId,
				'chat_message_content' => $chatMessageContent
				));
			return $id;
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : getChatMessage
		 * Description : This method get the chat message from database
		 */
		public function getChatMessage($chatId){
			#$query = "SELECT cm.user_id,cm.chat_message_content, DATE_FORMAT(cm.create_date,'%D of %M %Y at %H:%i:%m') as msg_create_date, u.firstName FROM `chat_messages` cm JOIN users u ON cm.user_id = u.users_id WHERE cm.chat_id = ?";
			$this->db->select('cm.user_id, cm.chat_message_content, DATE_FORMAT(cm.create_date, \'%D of %M %Y at %H:%i:%m\') as msg_create_date, u.firstName');
			$this->db->from('chat_messages cm');
			$this->db->join('users u','cm.user_id = u.users_id');
			$this->db->where('cm.chat_id',$chatId);
			$result = $this->db->get();
			// $result = $this->db->query($query,$chatId);
			return $result;
		}
	}