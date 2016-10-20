<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Jobagents
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Create.
	 *
	 * @param int $jobagentId
	 * @return array
	 */
	public function delete($userId, $jobagentId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/users/$userId/jobagents/$jobagentId" => []
		]);
	}

	/**
	 * Display a Person by ID.
	 *
	 * @param int $userId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/jobagents" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Display a Person by ID.
	 *
	 * @param int $jobagentId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function find($jobagentId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/jobagents/$jobagentId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Create.
	 *
	 * @param int $jobagentId
	 * @param array $data
	 * @return array
	 */
	public function update($jobagentId, array $data)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/jobagents/$jobagentId" => $data
		]);
	}

	/**
	 * Create.
	 *
	 * @param int $jobagentId
	 * @param array $data
	 * @return array
	 */
	public function updateStatus(array $data)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/jobagents/updateStatus" => $data
		]);
	}
	/**
	 * Insert.
	 *
	 * @param array $data
	 * @return array
	 */
	public function insert(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/jobagents" => $data
		]);
	}

	/**
	 * Get All.
	 *
	 * @param array $data
	 * @return array
	 */
	public function showAll()
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/jobagents" => []
		]);
	}
}