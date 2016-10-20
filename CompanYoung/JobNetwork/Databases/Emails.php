<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Emails
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function headerIndex(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email-headers" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param int $typeId
	 * @param array $data
	 * @return array
	 */
	public function sendTestEmail(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/email-send-test" => $data
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
	public function typeIndex(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email-types" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param array $data
	 * @param array|null $serverTemplate
	 * @param array|null $ajaxTemplate
	 * @return array
	 */
	public function templateIndex(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email-templates" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param array $cover
	 * @return array
	 */
	public function updateUserHeader(array $cover)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/email-user-header" => [
				'cover' => curl_file_create($cover['tmp_name'], $cover['type'], $cover['name'])
			]
		]);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param array $cover
	 * @return array
	 */
	public function updateEmployerHeader(array $cover)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/email-employer-header" => [
				'cover' => curl_file_create($cover['tmp_name'], $cover['type'], $cover['name'])
			]
		]);
	}

	/**
	 * Get a list of all crawlers.
	 *
	 * @param int $typeId
	 * @param array $data
	 * @return array
	 */
	public function updateTemplate($typeId, array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/email-templates/$typeId" => $data
		]);
	}

	/**
	 * Count all emails from jobagents
	 *
	 * @param int $typeId
	 * @param array $data
	 * @return array
	 */
	public function countJobAgents()
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email/jobagents" => []
		]);
	}

	/**
	 * Count all emails from jobagents
	 *
	 * @param int $typeId
	 * @param array $data
	 * @return array
	 */
	public function countDirectMails()
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email/count-direct-mails" => []
		]);
	}

	/**
	 * Count all emails from jobagents
	 *
	 * @param int $typeId
	 * @param array $data
	 * @return array
	 */
	public function getLatestDirectMails()
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email/get-latest-direct-mails" => []
		]);
	}




	/**
	 * Get recipients stats by date
	 *
	 * @param int $typeId
	 * @param array $data
	 * @return array
	 */
	public function recipientsStats(array $data)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email/recipientsStats" => $data
		]);
	}

	/**
	 * Get recipients stats by date
	 *
	 * @param int $typeId
	 * @param array $data
	 * @return array
	 */
	public function showMailHtml(array $data)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/email/show" => $data
		]);
	}
}