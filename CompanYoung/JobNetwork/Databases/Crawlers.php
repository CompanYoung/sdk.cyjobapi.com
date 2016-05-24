<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Crawlers
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Delete the data
	 *
	 * @param int $crawlerResultId
	 * @return array
	 */
	public function deletePost($crawlerResultId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/crawlers/posts/$crawlerResultId" => []
		]);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function index(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/crawlers" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawler categories.
	 *
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function showAll($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/crawlers/all" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawler categories.
	 *
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function categories($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/crawlers/categories" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawler results.
	 *
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function results(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/crawlers/results" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawler results.
	 *
	 * @param int $id
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function findResult($id, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/crawlers/results/$id" => []
		], $serverTemplate, $ajaxTemplate, true);
	}

	/**
	 * Patch the data
	 *
	 * @param int $crawlerResultId
	 * @param array $data
	 * @return array
	 */
	public function patchPost($crawlerResultId, array $data)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/crawlers/posts/$crawlerResultId" => $data
		]);
	}

	/**
	 * Set the crawler active.
	 *
	 * @param int $crawlerId
	 * @return array
	 */
	public function setActive($crawlerId)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/crawlers/$crawlerId/setActive" => []
		]);
	}

	/**
	 * Set the crawler inactive.
	 *
	 * @param int $crawlerId
	 * @return array
	 */
	public function setInactive($crawlerId)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/crawlers/$crawlerId/setInactive" => []
		]);
	}

	/**
	 * Post the data
	 *
	 * @param array $data
	 * @return array
	 */
	public function insertPost(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/crawlers/posts" => $data
		]);
	}
}