<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Conversation
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Send conversation message to a user
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
	 * @param array $data
	 * @return array
	 */
	public function sendConversationMessage(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/conversation/send-conversation-message" => $data
		]);
	}

	/**
	 * Show messages by user ID
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
	 * @param array $data
	 * @return array
	 */
	public function showByUserId(array $data)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/conversation/show-by-user" => $data
		]);
	}



}