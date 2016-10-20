<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Organizations
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Show an organization by ID
	 *
	 * @param integer $id
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function show($id, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$id/show" => [
			]], $serverTemplate, $ajaxTemplate);
	}

	public function store($data)
	{
		return Call::communicate('GET', [
			"organizations/storeOrganization" => $data], null, null);
	}

	public function setStatus($id ,$status){
		return Call::communicate('GET', [
			"organizations/$id/setStatus" => [
				'status' => $status
			]]);
	}

	public function organizationStats($id){
		return Call::communicate('GET', [
			"organizations/$id/organizationGoal" => [
			]]);
	}

	/**
	 * Delete position.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function deletePosition($id)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/positions" => [
				'idList' => [
					$id
				]
			]
		]);
	}




	/**
	 * Delete category.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function deleteCategory($id)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/categories" => [
				'idList' => [
					$id
				]
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function deleteType($id)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/types" => [
				'idList' => [
					$id
				]
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function deleteGeography($id)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/geographies" => [
				'idList' => [
					$id
				]
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function deleteRegion($id)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/regions" => [
				'idList' => [
					$id
				]
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function deleteCountry($id)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/countries" => [
				'idList' => [
					$id
				]
			]
		]);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function search(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/search" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $organizationId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function getInfo($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function getAdministrators($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/administrators" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function categories($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/categories" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $typeId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function categoriesByType($typeId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/categoriesByType" => [
				'type_id' => $typeId
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $positionId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function categoryByPosition($positionId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/categoryByPosition" => [
				'position_id' => $positionId
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
	public function countries($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/countries" => []
		], $serverTemplate, $ajaxTemplate);
	}

	public function searchCountries($src)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/countries/search" => $src
		], null, null);
	}

	public function geographies($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/geographies" => []
		], $serverTemplate, $ajaxTemplate);
	}

	public function geographiesById($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/geographiesById" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function linkTypes($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/linkTypes" => []
		], $serverTemplate, $ajaxTemplate);
	}

	public function positions($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/positions" => []
		], $serverTemplate, $ajaxTemplate);
	}

	public function positionsById($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/positionsById" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function regions($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/regions" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $typeId
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function regionsByCountry($typeId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/regionsByCountry" => [
				'country_id' => $typeId
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function totalGeographies(array $data = [], $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/totalGeographies" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function totalPositions(array $data = [], $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/totalPositions" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function types($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/types" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function update(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Edit the position name.
	 *
	 * @param integer $id
	 * @param string $name
	 * @return array
	 */
	public function editPosition($id, $name)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/positions/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Edit the category name.
	 *
	 * @param integer $id
	 * @param string $name
	 * @return array
	 */
	public function editCategory($id, $name)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/categories/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Edit the country name.
	 *
	 * @param integer $id
	 * @param string $name
	 * @return array
	 */
	public function editType($id, $name)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/types/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Edit the geography name.
	 *
	 * @param integer $id
	 * @param string $name
	 * @return array
	 */
	public function editGeography($id, $name)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/geographies/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Edit the region name.
	 *
	 * @param integer $id
	 * @param string $name
	 * @return array
	 */
	public function editRegion($id, $name)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/regions/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Edit the country name.
	 *
	 * @param integer $id
	 * @param string $name
	 * @return array
	 */
	public function editCountry($id, $name)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/countries/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Patch the data
	 *
	 * @param array $logo
	 * @return array
	 */
	public function patchLogo($logo)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/logo" => [
				'logo' => curl_file_create($logo['tmp_name'], $logo['type'], $logo['name'])
			]
		]);
	}

	/**
	 * Add new position.
	 *
	 * @param integer $categoryId
	 * @param string $name
	 * @return array
	 */
	public function addPosition($categoryId, $name)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/positions" => [
				'category_id' => $categoryId,
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $typeId
	 * @param string $name
	 * @return array
	 */
	public function addCategory($typeId, $name)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/categories" => [
				'type_id' => $typeId,
				'name' => $name
			]
		]);
	}

	/**
	 * Add new type.
	 *
	 * @param string $name
	 * @return array
	 */
	public function addType($name)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/types" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $regionId
	 * @param string $name
	 * @return array
	 */
	public function addGeography($regionId, $name)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/geographies" => [
				'region_id' => $regionId,
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $countryId
	 * @param string $name
	 * @return array
	 */
	public function addRegion($countryId, $name)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/regions" => [
				'country_id' => $countryId,
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param string $name
	 * @return array
	 */
	public function addCountry($name)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/countries" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Get dashboard info
	 *
	 * @param string $name
	 * @return array
	 */
	public function getDashBoardInfo()
	{
		return Call::communicate('get', [
			"organizations/$this->organizationId/dashboard-info" => []
		]);
	}

	/**
	 * Save frontend settings
	 *
	 * @param string $name
	 * @return array
	 */
	public function saveFrontendSetting($data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/save-frontend-setting" => $data
		]);
	}

	/**
	 * Save frontend style
	 *
	 * @param string $name
	 * @return array
	 */
	public function saveFrontendStyle($data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/save-frontend-style" => $data
		]);
	}

	/**
	 * Generate and return token to job feed
	 *
	 * @param string $name
	 * @return array
	 */
	public function generateToken()
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/generate-token" => []
		]);
	}




}