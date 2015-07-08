<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Jobagents
{
	/**
	 * Display a Person by ID.
	 * @param int $id
	 * @param int $version
	 * @return array
	 */
	public function get($id, $keepMetaData = false, $version = 1)
	{
		return Call::communicate($keepMetaData, $version, [ "organization/$organization_id" ], $this->table);
//        return $this->call([ "jobs/$id" => [] ], $version);
	}
}