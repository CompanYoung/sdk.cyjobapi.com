<?php

namespace App\CompanYoung\JobNetwork;

use App\CompanYoung\JobNetwork\Databases;

/**
 * Class Api
 * @package App\CompanYoung
 */
class Api
{
	protected $organizationId 	= null;

	/**
	 * @var Databases\Companies
	 */
	private $companies;

	/**
	 * @var Databases\Crawlers
	 */
	private $crawlers;

	/**
	 * @var Databases\Jobagents
	 */
	private $jobagents;

	/**
	 * @var Databases\Organizations
	 */
	private $organizations;

	/**
	 * @var Databases\Posts
	 */
	private $posts;

	/**
	 * @var Databases\System
	 */
	private $system;

	/**
	 * @var Databases\Users
	 */
	private $users;

	function __construct($specialSlug = null, $key = null, $apiVersion = 'v1')
	{
		require_once('Call.php');
		require_once('Databases/Companies.php');
		require_once('Databases/Crawlers.php');
		require_once('Databases/Jobagents.php');
		require_once('Databases/Organizations.php');
		require_once('Databases/Posts.php');
		require_once('Databases/System.php');
		require_once('Databases/Users.php');

		$this->boot($key, $apiVersion);
	}

	public function boot($key = null, $apiVersion = 'v1')
	{
		$authorization = base64_decode(
			$key ? $key : $_ENV['CYJOBAPI_AUTHORIZATION']
		);

		$type 			= explode(' ', $authorization);
		$authorization 	= explode(':', $type[1]);

		$this->organizationId = $authorization[0];

		$_ENV['CYJOBAPI_SIGNED'] = base64_encode("$type[0] $this->organizationId:$authorization[1]:" . date('Ymd'));

		if(!isset($_ENV['CYJOBAPI_URL']))
		{
			$_ENV['CYJOBAPI_URL'] = "http://api.cyjobapi.com/$apiVersion";
		}
	}

	/**
	 * @return Databases\Companies
	 */
	public function companies()
	{
		if(empty($this->companies))
		{
			$this->companies = new Databases\Companies($this->organizationId);
		}

		return $this->companies;
	}

	/**
	 * @return Databases\Crawlers
	 */
	public function crawlers()
	{
		if(empty($this->crawlers))
		{
			$this->crawlers = new Databases\Crawlers($this->organizationId);
		}

		return $this->crawlers;
	}

	/**
	 * @return Databases\Jobagents
	 */
	public function jobagents()
	{
		if(empty($this->jobagents))
		{
			$this->jobagents = new Databases\Jobagents($this->organizationId);
		}

		return $this->jobagents;
	}

	/**
	 * @return Databases\Organizations
	 */
	public function organizations()
	{
		if(empty($this->organizations))
		{
			$this->organizations = new Databases\Organizations($this->organizationId);
		}

		return $this->organizations;
	}

	/**
	 * @return Databases\Posts
	 */
	public function posts()
	{
		if(empty($this->posts))
		{
			$this->posts = new Databases\Posts($this->organizationId);
		}

		return $this->posts;
	}

	/**
	 * @return Databases\System
	 */
	public function system()
	{
		if(empty($this->system))
		{
			$this->system = new Databases\System();
		}

		return $this->system;
	}

	/**
	 * @return Databases\Users
	 */
	public function users()
	{
		if(empty($this->users))
		{
			$this->users = new Databases\Users($this->organizationId);
		}

		return $this->users;
	}
}