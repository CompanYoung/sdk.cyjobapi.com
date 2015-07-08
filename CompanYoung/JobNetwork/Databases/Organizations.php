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
	 * Get a list of all organizations.
	 *
	 * @param int $page
	 * @param int $rpp
	 * @param string $sort
	 * @param string $sort_direction
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index($page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param string $name
	 * @param array $identifiers
	 * @param array $subdomains
	 * @param int $page
	 * @param int $rpp
	 * @param string $sort
	 * @param string $sort_direction
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function search($name = null, $identifiers = null, $subdomains = null, $page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/search" => [
				'name' => $name,
				'identifier' => $identifiers,
				'subdomain' => $subdomains,
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction
			]
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
	 * Patch update info.
	 *
	 * @param int $language_id
	 * @param string $name
	 * @param string $subdomain
	 * @param string $cvr
	 * @param string $zipcode
	 * @param string $city
	 * @param string $address
	 * @param string $phoneNumber
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function patchInfo($language_id = null, $name = null, $subdomain = null, $cvr = null, $zipcode = null, $city = null, $address = null, $phoneNumber = null, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId" => [
				'language_id' => $language_id,
				'name' => $name,
				'subdomain' => $subdomain,
				'cvr' => $cvr,
				'zipcode' => $zipcode,
				'city' => $city,
				'address' => $address,
				'phone_number' => $phoneNumber
			]
		], $serverTemplate, $ajaxTemplate);
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
				'logo' => curl_file_create($logo['filename'], $logo['mimetype'], $logo['postname'])
			]
		]);
	}

	/**
	 * Put update info.
	 *
	 * @param int $language_id
	 * @param string $logo
	 * @param string $name
	 * @param string $subdomain
	 * @param string $cvr
	 * @param string $zipcode
	 * @param string $city
	 * @param string $address
	 * @param string $phoneNumber
	 * @return array
	 */
	public function putInfo($language_id = null, $logo = null,$name = null, $subdomain = null, $cvr = null, $zipcode = null, $city = null, $address = null, $phoneNumber = null)
	{
		return Call::communicate('PUT', [
			"organizations/$this->organizationId" => [
				'language_id' => $language_id,
				'logo' => $logo,
				'name' => $name,
				'subdomain' => $subdomain,
				'cvr' => $cvr,
				'zipcode' => $zipcode,
				'city' => $city,
				'address' => $address,
				'phone_number' => $phoneNumber
			]
		]);
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

	/**
	 * Get data
	 *
	 * @param int $typeId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
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
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function totalPositions($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/totalPositions" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function totalGeographies($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/totalGeographies" => []
		], $serverTemplate, $ajaxTemplate);
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
}