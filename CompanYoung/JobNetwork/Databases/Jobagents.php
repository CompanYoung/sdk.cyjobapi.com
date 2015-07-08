<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Jobagents
{
	/**
	 * Display a Person by ID.
	 *
	 * @param int $id
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function get($id, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId" => []
		], $serverTemplate, $ajaxTemplate);
	}
}