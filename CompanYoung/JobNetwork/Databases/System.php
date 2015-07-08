<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class System
{
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
			"system/applicationMethods" => []
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
			"system/crawlers" => []
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
			"system/hiringMethods" => []
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
			"system/languages" => []
		], $serverTemplate, $ajaxTemplate);
	}
}