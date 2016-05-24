<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class System
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Search the entire system.
	 *
	 * @param string $query
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function search($query, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/system/search" => [
				'query' => $query
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function applicationMethods($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/system/applicationMethods" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function crawlers($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/system/crawlers" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function hiringMethods($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/system/hiringMethods" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function deadlineMethods($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/system/deadlineMethods" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function getRoles($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/system/roles" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function languages($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/system/languages" => []
		], $serverTemplate, $ajaxTemplate);
	}




	/**
	 * Set the owner of the company.
	 *
	 * @param int $companyId
	 * @param int $administratorId
	 * @return array
	 */
	public function setCompanyAdministrator($companyId, $administratorId)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/system/companies/administrator" => [
				'company_id' => $companyId,
				'administrator_id' => $administratorId
			]
		]);
	}

	/**
	 * Set the owner of the company.
	 *
	 * @param int $postId
	 * @param int $administratorId
	 * @return array
	 */
	public function setPostAdministrator($postId, $administratorId)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/system/posts/administrator" => [
				'post_id' => $postId,
				'administrator_id' => $administratorId
			]
		]);
	}

	/**
	 * Set the owner of the user.
	 *
	 * @param int $userId
	 * @param int $administratorId
	 * @return array
	 */
	public function setUserAdministrator($userId, $administratorId)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/system/users/administrator" => [
				'company_id' => $userId,
				'administrator_id' => $administratorId
			]
		]);
	}
}