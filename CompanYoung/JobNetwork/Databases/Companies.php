<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Companies
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
	 * @param string $state
	 * @param string $state_extra
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index($page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $state = null, $state_extra = null, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction,
				'state' => $state,
				'state_extra' => $state_extra
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $id
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function find($id, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/$id" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string $name
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function findByName($name, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/name" => [
				'query' => $name
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param string $query
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function autoCompleteName($query, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/autocomplete/name" => [
				'query' => $query
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string $name
	 * @param int $geography_id
	 * @param string $logo|null
	 * @param string $cover|null
	 * @param string $description|null
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function insert($geography_id, $name, $logo = null, $cover = null, $description = null, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/companies" => [
				'name' 			=> $name,
				'geography_id' 	=> $geography_id,
				'logo' 			=> $logo ? curl_file_create($logo['filename'], $logo['mimetype'], $logo['postname']) : null,
				'cover'			=> $cover,
				'description' 	=> $description
			]
		], $serverTemplate, $ajaxTemplate);
	}
}