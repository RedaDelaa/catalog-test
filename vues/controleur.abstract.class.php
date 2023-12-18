<?php
	abstract class Controleur {
		protected $messagesErreur = array();
		public function __construct() {}
		public function getMessagesErreur() { return $this->messagesErreur; }
		abstract public function executerAction();
		
	}
	
?>