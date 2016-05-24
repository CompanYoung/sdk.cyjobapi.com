<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Users
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_index.md
	 * @param int $userId
	 * @return array
	 */
	public function delete($userId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/users/$userId" => []
		]);
	}

	/**
	 * unfollow
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_unfollow.md
	 * @param int $userId
	 * @param int $companyId
	 * @return array
	 */
	public function unfollow($userId, $companyId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/users/$userId/companies/$companyId/follow" => []
		]);
	}


	/**
	 * Get a list of all organizations.
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
			"organizations/$this->organizationId/users" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_index.md
	 * @param string $email
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function findByEmail($email, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/findByEmail" => [
				'email' => $email
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_find.md
	 * @param int $userId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function find($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_company_vacancies.md
	 * @param int $userId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function postVacancies($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/post-vacancies" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_company_vacancies.md
	 * @param int $userId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function companyFollowCount($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/companies/follow-count" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_find.md
	 * @param int $userId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function companies($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/companies" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_company_vacancies.md
	 * @param int $userId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function postVacanciesByCompanies($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/companies/post-vacancies" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_is_following.md
	 * @param int $userId
	 * @param int $companyId
	 * @return array
	 */
	public function isFollowing($userId, $companyId)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/companies/$companyId" => []
		]);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_jobagent_results.md
	 * @param int $userId
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function jobagentResults($userId, array $data = [], $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/jobagents/results" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_jobagent_results.md
	 * @param int $userId
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function jobagentCount($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/jobagents/count" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/GET_users_jobagent_results.md
	 * @param int $userId
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function jobagentResultsCount($userId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/users/$userId/jobagents/results-count" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_insert.md
	 * @param array $data
	 * @param array $picture
	 * @return array
	 */
	public function insert(array $data, array $picture = [])
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users" => array_merge($data, [
				'picture' => $picture ? curl_file_create($picture['tmp_name'], $picture['type'], $picture['name']) : null
			])
		]);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
	 * @param string $email
	 * @return array
	 */
	public function sendResetLink($email)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/send-reset-link" => [
				'email' => $email
			]
		]);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
	 * @param string $token
	 * @param string $password
	 * @param string $passwordConfirmation
	 * @return array
	 */
	public function resetPassword($token, $password, $passwordConfirmation)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/reset-password" => [
				'token' => $token,
				'password' => $password,
				'password_confirmation' => $passwordConfirmation,
			]
		]);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
	 * @param string $email
	 * @return array
	 */
	public function validatePasswordResetToken($token)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/validate-reset-password-token" => [
				'token' => $token
			]
		]);
	}

	/**
	 * validateLogin
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_validate_login.md
	 * @param array $data
	 * @return array
	 */
	public function validateLogin(array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/login/validate" => $data
		]);
	}

	/**
	 * doVerification
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_doverification_login.md
	 * @param int $userId
	 * @param array $data
	 * @return array
	 */
	public function doVerification($userId, array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/$userId/do-verification" => $data
		]);
	}

	/**
	 * undoVerification
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_undoverification_login.md
	 * @param int $userId
	 * @param array $data
	 * @return array
	 */
	public function undoVerification($userId, array $data)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/$userId/undo-verification" => $data
		]);
	}

	/**
	 * follow
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_follow.md
	 * @param int $userId
	 * @param int $companyId
	 * @return array
	 */
	public function follow($userId, $companyId)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/$userId/companies/$companyId/follow" => []
		]);
	}

	/**
	 * follow
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_follow.md
	 * @param int $userId
	 * @param array $data
	 * @return array
	 */
	public function update($userId, array $data)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/users/$userId" => $data
		]);
	}

	/**
	 * follow
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_follow.md
	 * @param int $userId
	 * @param int $facebook_id
	 * @return array
	 */
	public function updateFacebook($userId, $facebook_id)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/users/$userId/facebook" => [
				'facebook_id' => $facebook_id
			]
		]);
	}

	/**
	 * follow
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_follow.md
	 * @param int $userId
	 * @param string $password
	 * @param string $passwordConfirmation
	 * @return array
	 */
	public function updatePassword($userId, $password, $passwordConfirmation)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/users/$userId/password" => [
				'password' => $password,
				'password_confirmation' => $passwordConfirmation,
			]
		]);
	}

	/**
	 * follow
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_follow.md
	 * @param int $userId
	 * @param string $email
	 * @return array
	 */
	public function updateEmail($userId, $email)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/users/$userId/email" => [
				'email' => $email
			]
		]);
	}

	/**
	 * Set the owner of the user.
	 *
	 * @param int $userId
	 * @param int $administratorId
	 * @return array
	 */
	public function verifyEmail($userId, $administratorId)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/$userId/verifyEmail" => [
				'company_id' => $userId,
				'administrator_id' => $administratorId
			]
		]);
	}

	/**
	 * Update the user picture.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_user_picture.md
	 * @param int $userId
	 * @param array $logo
	 * @return array
	 */
	public function updatePicture($userId, array $logo)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/users/$userId/picture" => [
				'picture' => curl_file_create($logo['tmp_name'], $logo['type'], $logo['name'])
			]
		]);
	}
}