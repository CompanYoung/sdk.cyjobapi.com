<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class System
{
	/**
	 * Get data
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function applicationMethods($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"system/applicationMethods" => []
		]);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function crawlers($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"system/crawlers" => []
		], null, 'Setup/Crawlers.inc');
	}

	/**
	 * Get data
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function hiringMethods($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"system/hiringMethods" => []
		]);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @param bool $keepMetaData
	 * @return array
	 */
	public function languages($keepMetaData = false)
	{
		return Call::communicate('GET', $keepMetaData, [
			"system/languages" => []
		]);
	}
}