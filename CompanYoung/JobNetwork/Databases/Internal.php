<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Internal
{
	/**
	 * Delete the organization.
	 *
	 * @param integer $organizationId
	 * @return array
	 */
	public function deleteOrganization($organizationId)
	{
		return Call::communicate('DELETE', [
			"organizations/$organizationId" => []
		]);
	}

	/**
	 * Delete the organization.
	 *
	 * @param integer $organizationId
	 * @return array
	 */
	public function insertOrganization($organizationId)
	{
		return Call::communicate('DELETE', [
			"organizations/$organizationId" => []
		]);
	}
}