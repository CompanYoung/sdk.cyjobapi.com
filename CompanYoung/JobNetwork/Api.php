<?php

namespace App\CompanYoung\JobNetwork;

use App\CompanYoung\Call;
use App\CompanYoung\JobNetwork\Databases;

/**
 * Class Api
 * @package App\CompanYoung
 */
class Api
{
	protected $organizationId = null;

	/**
	 * @var Databases\Administrators
	 */
	private $administrators;

	/**
	 * @var Databases\Companies
	 */
	private $companies;

	/**
	 * @var Databases\Contacts
	 */
	private $contacts;

	/**
	 * @var Databases\Crawlers
	 */
	private $crawlers;

	/**
	 * @var Databases\Emails
	 */
	private $emails;

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

	function __construct($specialSlug = null, $key = null)
	{
		require_once('Call.php');
		require_once('Databases/Companies.php');
		require_once('Databases/Contacts.php');
		require_once('Databases/Crawlers.php');
		require_once('Databases/Emails.php');
		require_once('Databases/Jobagents.php');
		require_once('Databases/Organizations.php');
		require_once('Databases/Posts.php');
		require_once('Databases/System.php');
		require_once('Databases/Users.php');

		if($specialSlug and in_array(env('DOMAIN'), [ 'cyjobapi.dev', 'cyjobapi.com', 'nextcyjobapi.com' ]))
		{
			$_ENV['CYJOBAPI_SIGNED'] = '4bf4210022fb66494edb587aff5b30fa';

			$result = Call::communicate('GET', [
				"organizations/search" => [
					'subdomain' => [ $specialSlug ]
				]
			]);

			$this->organizationId 	= $result['data'][0]['id'];
		}
		else
		{
			$this->boot($key);
		}
	}

	public function boot($key = null)
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
			$_ENV['CYJOBAPI_URL'] = "http://v1.api.cyjobapi.com";
		}
	}

	/**
	 * @return Databases\Companies
	 */
	public function administrators()
	{
		if(empty($this->administrators))
		{
			$this->administrators = new Databases\Administrators($this->organizationId);
		}
		return $this->administrators;
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
	 * @return Databases\Contacts
	 */
	public function contacts()
	{
		if(empty($this->contacts))
		{
			$this->contacts = new Databases\Contacts($this->organizationId);
		}

		return $this->contacts;
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
	 * @return Databases\Emails
	 */
	public function emails()
	{
		if(empty($this->emails))
		{
			$this->emails = new Databases\Emails($this->organizationId);
		}

		return $this->emails;
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
			$this->system = new Databases\System($this->organizationId);
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