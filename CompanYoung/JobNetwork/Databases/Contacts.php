<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Contacts
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Delete the contact by ID
	 *
	 * @param int $contactId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function delete($contactId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/contacts/$contactId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index($serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/contacts" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string $email
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function findByEmail($email, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/contacts/findByEmail" => [
				'email' => $email
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param string $query
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function autoCompleteEmail($query, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/contacts/autocomplete/email" => [
				'query' => $query
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $contactId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function find($contactId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/contacts/$contactId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @param int $contactId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function update($contactId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/contacts/$contactId" => []
		], $serverTemplate, $ajaxTemplate);
	}


	/**
	 * Post the data
	 *
	 * @param string $email
	 * @param string $name
	 * @param string|null $telephone
	 * @return array
	 */
	public function insert($email, $name, $telephone = null)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/contacts" => [
				'email' => $email,
				'name' => $name,
				'telephone' => $telephone
			]
		]);
	}
}