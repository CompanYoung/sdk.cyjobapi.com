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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function index($page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $state = null, $state_extra = null, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/companies" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction,
				'state' => $state,
				'state_extra' => $state_extra
			]
		], null, 'Companies.inc');
	}

	/**
	 * Get data
	 *
	 * @param int $id
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function find($id, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/companies/$id" => []
		]);
	}

	/**
	 * Get data
	 *
	 * @param string $name
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function findByName($name, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/companies/name" => [
				'query' => $name
			]
		]);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param string $query
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function autoCompleteName($query, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/companies/autocomplete/name" => [
				'query' => $query
			]
		], null, 'AutoComplete.inc');
	}

	/**
	 * Get data
	 *
	 * @param string $name
	 * @param int $geography_id
	 * @param string $logo|null
	 * @param string $cover|null
	 * @param string $description|null
	 * @param bool $keepMetaData|bool
	 * @return array
	 */
	public function insert($geography_id, $name, $logo = null, $cover = null, $description = null, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
			"organizations/$this->organizationId/companies" => [
				'name' 			=> $name,
				'geography_id' 	=> $geography_id,
				'logo' 			=> $logo ? curl_file_create($logo['filename'], $logo['mimetype'], $logo['postname']) : null,
				'cover'			=> $cover,
				'description' 	=> $description
			]
		]);
	}
}