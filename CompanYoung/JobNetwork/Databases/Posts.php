<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Posts
{
	private $organizationId = 0;

	function __construct($organizationId)
	{
		$this->organizationId = $organizationId;
	}

	/**
	 * Deactivate the job.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_deactivate.md
	 * @param int $postId
	 * @return array
	 */
	public function delete($postId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/posts/$postId" => []
		]);
	}

	/**
	 * Deactivate the job.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_deactivate.md
	 * @param int $postId
	 * @return array
	 */
	public function deletePositions($postId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/posts/$postId/positions" => []
		]);
	}

	/**
	 * Deactivate the job.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_deactivate.md
	 * @param int $postId
	 * @return array
	 */
	public function deleteGeographies($postId)
	{
		return Call::communicate('DELETE', [
			"organizations/$this->organizationId/posts/$postId/geographies" => []
		]);
	}

	/**
	 * Get a list of all organizations.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts.md
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function index(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Perform a search on the posts
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_search.md
	 * @param array $data
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function search(array $data, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/search" => $data
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get total amount of posts.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_find.md
	 * @return array
	 */
	public function total()
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/total" => []
		]);
	}

	/**
	 * Get data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_find.md
	 * @param int $postId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function find($postId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/$postId" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get the job statistics.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_statistics.md
	 * @param int $postId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function positions($postId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/$postId/positions" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get the job statistics.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_statistics.md
	 * @param int $postId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function geographies($postId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/$postId/geographies" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get the job statistics.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_statistics.md
	 * @param int $postId
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function statistics($postId, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/$postId/statistics" => []
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Get the job statistics.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_statistics.md
	 * @param int $postId
	 * @param string $token
	 * @param string|null $serverTemplate
	 * @param string|null $ajaxTemplate
	 * @return array
	 */
	public function verifyToken($postId, $token, $serverTemplate = null, $ajaxTemplate = null)
	{
		return Call::communicate('GET', [
			"organizations/$this->organizationId/posts/$postId/verify-token" => [
				'token' => $token
			]
		], $serverTemplate, $ajaxTemplate);
	}

	/**
	 * Post the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_find.md
	 * @param array $data
	 * @param array $cover
	 * @param array $attachments
	 * @return array
	 */
	public function insert(array $data, array $cover = [], array $attachments = [])
	{
		if(isset($attachments['tmp_name']))
		{
			$attachments = [$attachments];
		}

		$attachmentResult = [];

		foreach($attachments as $attachment)
		{
			$attachmentResult[] = curl_file_create($attachment['tmp_name'], $attachment['type'], $attachment['name']);
		}

		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts" => array_merge($data, [
				'cover' => $cover ? curl_file_create($cover['tmp_name'], $cover['type'], $cover['name']) : null,
				'attachments' => $attachmentResult ? $attachmentResult : null
			])
		]);
	}

	/**
	 * Post the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_find.md
	 * @param int $postId
	 * @return array
	 */
	public function insertPosition($postId, $positionId)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts/$postId/position" => [
				'id' => $positionId
			]
		]);
	}

	/**
	 * Post the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_find.md
	 * @param int $postId
	 * @param array $positions
	 * @return array
	 */
	public function insertPositions($postId, array $positions)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts/$postId/positions" => [
				'id' => $positions
			]
		]);
	}




	/**
	 * Post the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_find.md
	 * @param int $postId
	 * @return array
	 */
	public function insertGeography($postId, $geographyId)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts/$postId/geography" => [
				'id' => $geographyId
			]
		]);
	}

	/**
	 * Post the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/GET_posts_find.md
	 * @param int $postId
	 * @param array $geographies
	 * @return array
	 */
	public function insertGeographies($postId, array $geographies)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts/$postId/geographies" => [
				'id' => $geographies
			]
		]);
	}

	/**
	 * Increment click.
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/POST_posts_increment_apply_click.md
	 * @param int $postId
	 * @param int|null $identifier
	 * @return array
	 */
	public function incrementApplyClick($postId, $identifier = null)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts/$postId/click" => [
				'identifier' => $identifier
			]
		]);
	}

	/**
	 * Patch the data
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_update.md
	 * @param int $postId
	 * @param array $data
	 * @return array
	 */
	public function update($postId, array $data)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/posts/$postId" => $data
		]);
	}

	/**
	 * Update the cover
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/POST_posts_update_cover.md
	 * @param int $postId
	 * @param array $cover
	 * @return array
	 */
	public function updateCover($postId, $cover)
	{
		return Call::communicate('POST', [
			"organizations/$this->organizationId/posts/$postId/cover" => [
				'cover' => curl_file_create($cover['tmp_name'], $cover['type'], $cover['name'])
			]
		]);
	}

	/**
	 * Activate the job
	 *
	 * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/posts/PATCH_posts_activate.md
	 * @param int $postId
	 * @return array
	 */
	public function activate($postId)
	{
		return Call::communicate('PATCH', [
			"organizations/$this->organizationId/posts/$postId/activate" => []
		]);
	}
}