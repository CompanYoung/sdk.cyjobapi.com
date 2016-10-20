<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Fields
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Store the field
	 *
	 * @param array $data
	 * @return array
	 */
	public function store(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/fields/store" => $data
		]);
	}

	/**
	 * Update the field
	 *
	 * @param array $data
	 * @return array
	 */
	public function update(array $data)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/fields/update" => $data
		]);
	}

	/**
	 * Store the checklist option
	 *
	 * @param array $data
	 * @return array
	 */
	public function storeOption(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/fields/option" => $data
		]);
	}

	/**
	 * Delete the checklist option
	 *
	 * @param array $data
	 * @return array
	 */
	public function deleteOption(array $data)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/fields/option" => $data
		]);
	}

	/**
	 * Delete the checklist option
	 *
	 * @param array $data
	 * @return array
	 */
	public function deleteField(array $data)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/fields/delete" => $data
		]);
	}

	/**
	 * Toggles activation on a field
	 *
	 * @param array $data
	 * @return array
	 */
	public function toggleActivation(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/fields/toggleActivation" => $data
		]);
	}

	/**
	 *  Show all fields with the given type
	 *
	 * @param array $data
	 * @return array
	 */
	public function showAll($type)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/fields/showAll" => ['type' => $type]
		]);
	}


	/**
	 * Get a list of all fields.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_index.md
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/fields/list" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 *  Show all fields with the given type
	 *
	 * @param array $data
	 * @return array
	 */
	public function showField(array $data)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/fields/showField" => $data
		]);
	}

	/**
	 *  Validates the field values
	 *
	 * @param array $data
	 * @return array
	 */
	public function storeFields(array $data){
		return Call::communicate('POST', [
			"organizations/$this->organizationId/fields/storeFields" => $data
		]);
	}

	/**
	 *  Validates the field values
	 *
	 * @param array $data
	 * @return array
	 */
	public function sortFields(array $data){
		return Call::communicate('POST', [
			"organizations/$this->organizationId/fields/sort" => $data
		]);
	}

	/**
	 *  Validates the field values
	 *
	 * @param array $data
	 * @return array
	 */
	public function detachAttachment(array $data){
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/fields/detachAttachment" => $data
		]);
	}
}