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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function index($page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $state = null, $stateExtra = null, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/users" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction,
				'state' => $state,
				'stateExtra' => $stateExtra
			]
		], null, 'Users.inc');
	}

	/**
	 * Display a Person by ID.
	 * @param int $organizationId
	 * @param string $email
	 * @param string $password
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function login($organizationId, $email, $password, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
			"organizations/$organizationId/users/login" => [
				'email' => $email,
				'password' => $password
			]
		]);
	}

	public function all($organizationId, $rpp = 10, $page = 1, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
			"organizations/$organizationId" => []
		]);
	}
}