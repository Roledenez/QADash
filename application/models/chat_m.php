<?php

/**
 * @author : Roledene
		 * Type : class
		 * Name : chat_m
		 * Description : This class represent the chat model
		 */
	class chat_m extends My_Model{
		/**
		 * @var string
		 * @access protected
		 */
		protected $_table_name = "chat_messages";
		/**
		 * @var string
		 * @access protected
		 */
		protected $_order_by = "";
		/**
		 * @var bool
		 * @access protected
		 */
		protected $_timestamps = FALSE;

		/**
		 * @author : Roledene
		 * Type : constructor
		 * Name : __construct
		 * Description : Default constructor for chat_m class
		 */
		public function __construct(){
			parent::__construct();
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : addChatMessage
		 * @param int $chatId
		 * @param int $userId
		 * @param string $chatMessageContent
		 * @return int user id
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

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : getChatMessage
		 * @param int $chatId
		 * @param int $lastChatMsgId default = 0
		 * @return string sql query
		 * Description : This method get the chat message from database
		 */
		public function getChatMessage($chatId,$lastChatMsgId = 0){

			#$query = "SELECT cm.user_id,cm.chat_message_content, DATE_FORMAT(cm.create_date,'%D of %M %Y at %H:%i:%m') as msg_create_date, u.firstName FROM `chat_messages` cm JOIN users u ON cm.user_id = u.users_id WHERE cm.chat_id = ?";
			$this->db->select('cm.user_id, cm.chat_id, cm.chat_message_content, DATE_FORMAT(cm.create_date, \'%D of %M %Y at %H:%i:%m\') as msg_create_date, u.firstName');
			$this->db->from('chat_messages cm');
			$this->db->join('users u','cm.user_id = u.users_id');
			$where = 'cm.chat_message_id > '.$lastChatMsgId.' and cm.chat_id = '.$chatId;
			$this->db->where($where);
				$method =  "result";

			$result = $this->db->get()->$method();
			// $result = $this->db->query($query,$chatId);
			return $result;
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : getChatMesage
		 * @param int $chatId
		 * @param int $lastChatMsgId default = 0
		 * @return string sql query
		 * @deprecated Method deprecated in Release 2.0.0
		 * Description : This method get the chat message from database
		 */
		public function getChatMesage($chatId,$lastChatMsgId = 0){
			try {
			#$query = "SELECT cm.user_id,cm.chat_message_content, DATE_FORMAT(cm.create_date,'%D of %M %Y at %H:%i:%m') as msg_create_date, u.firstName FROM `chat_messages` cm JOIN users u ON cm.user_id = u.users_id WHERE cm.chat_id = ?";
			$this->db->select('cm.user_id, cm.chat_id, cm.chat_message_content, DATE_FORMAT(cm.create_date, \'%D of %M %Y at %H:%i:%m\') as msg_create_date, u.firstName');
			$this->db->from('chat_messages cm');
			$this->db->join('users u','cm.user_id = u.users_id');
			$where = 'cm.chat_message_id > '.$lastChatMsgId.' and cm.chat_id = '.$chatId;
			$this->db->where($where);
				$method =  "result";

			$result = $this->db->get()->$method();
			// $result = $this->db->query($query,$chatId);
			return $result;

			} catch (Exception $e) {
				var_dump($e);
			}
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : getUnreadChats
		 * @return string sql query as a json
		 * Description : This method get all the unread chat message from database
		 */
		function getUnreadChats()
		{
			try {
				$this->db->select('*');
				$this->db->from('chat_messages');
				$this->db->where('read=0 and user_id=' . $this->session->userdata('uid'));
				$query = $this->db->get()->result();
				return json_encode($query);
			} catch (Exception $exc) {
				echo $exc->getTraceAsString();
			}
		}
	}