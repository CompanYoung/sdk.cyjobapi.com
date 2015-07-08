<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Posts
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
			"organizations/$this->organizationId/posts" => [
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
	 * Perform a search on the posts.
	 *
	 * @param string|null $title
	 * @param string|null $text
	 * @param array|null $types
	 * @param array|null $type_names
	 * @param array|null $categories
	 * @param array|null $category_names
	 * @param array|null $positions
	 * @param array|null $position_names
	 * @param array|null $countries
	 * @param array|null $country_names
	 * @param array|null $regions
	 * @param array|null $region_names
	 * @param array|null $geographies
	 * @param array|null $geography_names
	 * @param string $deadline_at
	 * @param string $inactive_at
	 * @param string $created_at
	 * @param int $page
	 * @param int $rpp
	 * @param string $sort
	 * @param string $sort_direction
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function search($title = null, $text = null, $types = null, $type_names = null, $categories = null, $category_names = null, $positions = null, $position_names = null, $countries = null, $country_names = null, $regions = null, $region_names = null, $geographies = null, $geography_names = null, $deadline_at = null, $inactive_at = null, $created_at = null, $page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/search" => [
				'title' => $title,
				'text' => $text,
				'types' => $types,
				'type_names' => $type_names,
				'categories' => $categories,
				'category_names' => $category_names,
				'positions' => $positions,
				'position_names' => $position_names,
				'countries' => $countries,
				'country_names' => $country_names,
				'regions' => $regions,
				'region_names' => $region_names,
				'geographies' => $geographies,
				'geography_names' => $geography_names,
				'deadline_at' => $deadline_at,
				'inactive_at' => $inactive_at,
				'created_at' => $created_at,
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $postId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function find($postId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/$postId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Post the data
	 *
	 * @param int $company_id
	 * @param int $application_method_id
	 * @param string $application_method_content
	 * @param string $language
	 * @param string $title
	 * @param string $html
	 * @param string $zipcode
	 * @param string $city
	 * @param string|null $cover
	 * @param string $deadline_at
	 * @param int $hiring_method_id
	 * @param string $hired_at
	 * @param string $inactive_at
	 * @param array $positions
	 * @param array $geographies
	 * @return array
	 */
	public function insert($company_id, $application_method_id, $application_method_content, $language, $title, $html, $zipcode, $city, $cover = null, $deadline_at, $hiring_method_id, $hired_at, $inactive_at, $positions, $geographies)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts" => [
				'company_id' => $company_id,
				'application_method_id' => $application_method_id,
				'application_method_content' => $application_method_content,
				'language' => $language,
				'title' => $title,
				'html' => $html,
				'zipcode' => $zipcode,
				'city' => $city,
				'cover' => $cover ? curl_file_create($cover['filename'], $cover['mimetype'], $cover['postname']) : null,
				'deadline_at' => $deadline_at,
				'hiring_method_id' => $hiring_method_id,
				'hired_at' => $hired_at,
				'inactive_at' => $inactive_at,
				'positions' => $positions,
				'geographies' => $geographies
			]
		]);
	}

	/**
	 * Patch the data
	 *
	 * @param int $postId
	 * @param int $company_id
	 * @param int $application_method_id
	 * @param string $application_method_content
	 * @param string $language
	 * @param string $title
	 * @param string $html
	 * @param string $zipcode
	 * @param string $city
	 * @param string $deadline_at
	 * @param int $hiring_method_id
	 * @param string $hired_at
	 * @param string $inactive_at
	 * @param array $positions
	 * @param array $geographies
	 * @return array
	 */
	public function patchUpdate($postId, $company_id, $application_method_id, $application_method_content, $language, $title, $html, $zipcode, $city, $deadline_at, $hiring_method_id, $hired_at, $inactive_at, $positions, $geographies)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/posts/$postId" => [
				'company_id' => $company_id,
				'application_method_id' => $application_method_id,
				'application_method_content' => $application_method_content,
				'language' => $language,
				'title' => $title,
				'html' => $html,
				'zipcode' => $zipcode,
				'city' => $city,
				'deadline_at' => $deadline_at,
				'hiring_method_id' => $hiring_method_id,
 				'hired_at' => $hired_at,
				'inactive_at' => $inactive_at,
				'positions' => $positions,
				'geographies' => $geographies
			]
		]);
	}

	/**
	 * Patch the data
	 *
	 * @param int $postId
	 * @param array $cover
	 * @return array
	 */
	public function patchCover($postId, $cover)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts/$postId/cover" => [
				'cover' => curl_file_create($cover['filename'], $cover['mimetype'], $cover['postname']),
			]
		]);
	}

	/**
	 * Activate the job.
	 *
	 * @param int $postId
	 * @return array
	 */
	public function activate($postId)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/posts/$postId/activate" => []
		]);
	}

	/**
	 * Deactivate the job.
	 *
	 * @param int $postId
	 * @return array
	 */
	public function deactivate($postId)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/posts/$postId/deactivate" => []
		]);
	}

	/**
	 * Get the job statistics.
	 *
	 * @param int $postId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function statistics($postId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/$postId/statistics" => []
		], $serverTemplate, $ajaxTemplate);
	}
}