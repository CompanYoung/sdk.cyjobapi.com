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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function index($page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction
			]
		]);
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
	 * @param string $serverTemplate
	 * @param string $ajaxTemplate
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function search($name = null, $identifiers = null, $subdomains = null, $page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $serverTemplate = null, $ajaxTemplate = null, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function getAdministrators($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/administrators" => []
		]);
	}



	/**
	 * Get data
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function getInfo($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId" => []
		]);
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function patchInfo($language_id = null, $name = null, $subdomain = null, $cvr = null, $zipcode = null, $city = null, $address = null, $phoneNumber = null, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
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
		]);
	}

	/**
	 * Patch the data
	 *
	 * @param array $logo
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function patchLogo($logo, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function putInfo($language_id = null, $logo = null,$name = null, $subdomain = null, $cvr = null, $zipcode = null, $city = null, $address = null, $phoneNumber = null, $keepMetaData = false)
	{
		return Call::communicate('OUT', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function types($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/types" => []
		]);
	}

	/**
	 * Get data
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function countries($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/countries" => []
		]);
	}

	/**
	 * Get data
	 *
	 * @param int $typeId
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function regionsByCountry($typeId, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/regionsByCountry" => [
				'country_id' => $typeId
			]
		]);
	}

	/**
	 * Get data
	 *
	 * @param int $typeId
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function categoriesByType($typeId, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/categoriesByType" => [
				'type_id' => $typeId
			]
		]);
	}


	/**
	 * Get data
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function totalPositions($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/totalPositions" => []
		]);
	}

	/**
	 * Get data
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function totalGeographies($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/totalGeographies" => []
		]);
	}




	/**
	 * Add new country.
	 *
	 * @param string $name
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function addCountry($name, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function editCountry($id, $name, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/countries/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function deleteCountry($id, $keepMetaData = false)
	{
		return Call::communicate('DELETE', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function addRegion($countryId, $name, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function editRegion($id, $name, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/regions/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function deleteRegion($id, $keepMetaData = false)
	{
		return Call::communicate('DELETE', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function addGeography($regionId, $name, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function editGeography($id, $name, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/geographies/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function deleteGeography($id, $keepMetaData = false)
	{
		return Call::communicate('DELETE', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function addType($name, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function editType($id, $name, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/types/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Add new country.
	 *
	 * @param integer $id
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function deleteType($id, $keepMetaData = false)
	{
		return Call::communicate('DELETE', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function addCategory($typeId, $name, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function editCategory($id, $name, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/categories/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Delete category.
	 *
	 * @param integer $id
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function deleteCategory($id, $keepMetaData = false)
	{
		return Call::communicate('DELETE', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function addPosition($categoryId, $name, $keepMetaData = false)
	{
		return Call::communicate('POST', $keepMetaData, [
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
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function editPosition($id, $name, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/positions/$id" => [
				'name' => $name
			]
		]);
	}

	/**
	 * Delete position.
	 *
	 * @param integer $id
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function deletePosition($id, $keepMetaData = false)
	{
		return Call::communicate('DELETE', $keepMetaData, [
			"organizations/$this->organizationId/positions" => [
				'idList' => [
					$id
				]
			]
		]);
	}
}