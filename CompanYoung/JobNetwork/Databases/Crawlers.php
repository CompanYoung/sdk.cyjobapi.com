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
	 * Get a list of all crawlers.
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
			"organizations/$this->organizationId/crawlers" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction
			]
		], null, 'Setup/Crawlers.inc');
	}

	/**
	 * Get a list of all crawler results.
	 *
	 * @param int $page
	 * @param int $rpp
	 * @param string $sort
	 * @param string $sort_direction
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function results($page = 1, $rpp = 10, $sort = 'created_at', $sort_direction = 'desc', $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/crawlers/results" => [
				'page' => $page,
				'rpp' => $rpp,
				'sort' => $sort,
				'sort_direction' => $sort_direction
			]
		], null, 'Jobs/Crawler.inc');
	}

	/**
	 * Get a list of all crawler results.
	 *
	 * @param int $id
	 * @param string $serverTemplate
	 * @param string $ajaxTemplate
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function findResult($id, $serverTemplate = null, $ajaxTemplate = null, $keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"organizations/$this->organizationId/crawlers/results/$id" => []
		], $serverTemplate, $ajaxTemplate, true);
	}

	/**
	 * Set the crawler active.
	 *
	 * @param int $crawlerId
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function setActive($crawlerId, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/crawlers/$crawlerId/setActive" => []
		]);
	}

	/**
	 * Set the crawler inactive.
	 *
	 * @param int $crawlerId
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function setInactive($crawlerId, $keepMetaData = false)
	{
		return Call::communicate('PATCH', $keepMetaData, [
			"organizations/$this->organizationId/crawlers/$crawlerId/setInactive" => []
		]);
	}
}