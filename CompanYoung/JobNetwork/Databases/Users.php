<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Users
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param int $page
	 * @param int $rpp
	 * @param string $sort
	 * @param string $sort_direction
	 * @param array|null $state
	 * @param array|null $stateExtra
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index($page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $state = null, $stateExtra = null, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction,
				'state' => $state,
				'stateExtra' => $stateExtra
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Display a Person by ID.
	 * @param int $organizationId
	 * @param string $email
	 * @param string $password
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function login($organizationId, $email, $password, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('POST', [
			"organizations/$organizationId/users/login" => [
				'email' => $email,
				'password' => $password
			]
		], $serverTemplate, $ajaxTemplate);
	}
}