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
	 * Delete the company by ID
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/DELETE_delete.md
	 * @param int $companyId
	 * @return array
	 */
	public function delete($companyId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/companies/$companyId" => []
		]);
	}

	/**
	 * Get a list of all companies
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/GET_index.md
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function index(array $data, array $serverTemplate = null, array $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/GET_find_by_name.md
	 * @param string $query
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function findByName($query, array $serverTemplate = null, array $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/name" => [
				'query' => $query
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/MIX_find_by_name_or_create.md
	 * @param array $data
	 * @param array $logo
	 * @param array $cover
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function findByNameOrCreate(array $data, array $logo = [], array $cover = [], array $serverTemplate = null, array $ajaxTemplate = null)
	{
		// Get the company by name
		$company = $this->findByName($data['name'], $serverTemplate, $ajaxTemplate);

		// Check if the company exists
		if(false === $company['success'])
		{
			$result = $this->insert([
				'name' => $data['name']
			], $logo, $cover);

			$company = $this->findByName($data['name'], $serverTemplate, $ajaxTemplate);
		}

		return $company;
	}

	/**
	 * Search for companies
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/GET_search.md
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function search(array $data, array $serverTemplate = null, array $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/search" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Find by company ID
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/GET_find.md
	 * @param int $companyId
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function find($companyId, array $serverTemplate = null, array $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/$companyId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get the posts belonging to the company
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/GET_posts.md
	 * @param int $companyId
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function posts($companyId, array $serverTemplate = null, array $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/$companyId/posts" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/GET_auto_complete_name.md
	 * @param string $query
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function autoCompleteName($query, array $serverTemplate = null, array $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/companies/autocomplete/name" => [
				'query' => $query
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Patch the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/PATCH_update.md
	 * @param int $companyId
	 * @param array $data
	 * @return array
	 */
	public function update($companyId, array $data)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/companies/$companyId" => $data
		]);
	}

	/**
	 * Insert a new company
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/POST_insert.md
	 * @param array $data
	 * @param array $logo
	 * @param array $cover
	 * @return array
	 */
	public function insert(array $data, array $logo = [], array $cover = [])
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/companies" => array_merge($data, [
				'logo' => $logo ? curl_file_create($logo['tmp_name'], $logo['type'], $logo['name']) : null,
				'cover' => $cover ? curl_file_create($cover['tmp_name'], $cover['type'], $cover['name']) : null
			])
		]);
	}

	/**
	 * Patch the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/POST_update_logo.md
	 * @param int $companyId
	 * @param array $logo
	 * @return array
	 */
	public function updateLogo($companyId, array $logo)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/companies/$companyId/logo" => [
				'logo' => curl_file_create($logo['tmp_name'], $logo['type'], $logo['name'])
			]
		]);
	}

	/**
	 * Patch the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/POST_update_cover.md
	 * @param int $companyId
	 * @param array $cover
	 * @return array
	 */
	public function updateCover($companyId, array $cover)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/companies/$companyId/cover" => [
				'cover' => curl_file_create($cover['tmp_name'], $cover['type'], $cover['name'])
			]
		]);
	}

	/**
	 * Patch the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/POST_add_link.md
	 * @param int $companyId
	 * @param string $url
	 * @param int $link_type_id
	 * @return array
	 */
	public function addLink($companyId, $url, $link_type_id)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/companies/$companyId/links" => [
				'url' => $url,
				'link_type_id' => $link_type_id
			]
		]);
	}

	/**
	 * Patch the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/companies/POST_delete_link.md
	 * @param int $companyId
	 * @param int $linkId
	 * @return array
	 */
	public function deleteLink($companyId, $linkId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/companies/$companyId/links/$linkId" => []
		]);
	}

	/**
	 * Activate the job
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_activate.md
	 * @param int $postId
	 * @return array
	 */
	public function activate($postId)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/companies/$postId/activate" => []
		]);
	}
}