<?php

namespace App\CompanYoung;

use App\CompanYoung\JobNetwork\Databases;

class Call
{
	protected static $locale = 'da';

	public static function communicate($method, $keepMetaData, $uris, $serverTemplate = null, $ajaxTemplate = null, $single = false)
	{
		foreach($uris as $uri => $data)
		{
			// append the function name to the url
			$uri = $_ENV['CYJOBAPI_URL'] . '/' . $uri;

			// merge locale into method data
			$data = array_merge($data, [
				'locale' => static::$locale
			]);

			// initialize curl
			$handler = curl_init();

			if ($method == 'POST')
			{
				$post = [];

				static::http_build_query_for_curl($data, $post);

				curl_setopt_array($handler, [
						CURLOPT_POST => true,
						CURLOPT_POSTFIELDS => $post
					]
				);
			}
			else
			{
				$uri .= '?' . http_build_query($data);

				if(in_array($method, [ 'PUT', 'PATCH', 'DELETE' ]))
				{
					curl_setopt_array($handler, [
							CURLOPT_CUSTOMREQUEST => $method,
						]
					);
				}
			}


			// set the options
			curl_setopt_array($handler, [
					CURLOPT_URL => $uri,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_CONNECTTIMEOUT => 2,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HEADER => false,
					CURLOPT_HTTPHEADER => array(
						'Host: ' . parse_url($_ENV['CYJOBAPI_URL'])['host'],
						'Accept-Language: ' . static::$locale,
						'Authorization: ' . $_ENV['CYJOBAPI_SIGNED'],
						'Accept: application/json'
					)
				]
			);

			// execute the handler
			$result = curl_exec($handler);
			$decoded = json_decode($result, true);

//			var_dump($uri);
//			var_dump($result);

			if(empty($decoded))
			{
				echo($result);
				exit('UnparseableResponseException');
			}

			// dispose of the handler
			curl_close($handler);

			if($serverTemplate and $decoded['success'])
			{
				if($single)
				{
					ob_start();

					$row = $decoded['data'];

					include("Stubs/Server/$serverTemplate");

					$decoded['data'] = ob_get_clean();
				}
				else
				{
					foreach($decoded['data'] as &$row)
					{
						$row = include("Stubs/Server/$serverTemplate");
					}
				}
			}

			if($ajaxTemplate and $decoded['success'])
			{
				$decoded = array_merge_recursive($decoded, [
					'meta' => [
						'template' => include("Stubs/Ajax/$ajaxTemplate")
					]
				]);
			}

			return $decoded;
		}
	}

	private static function http_build_query_for_curl($arrays, &$new = array(), $prefix = null)
	{
		foreach($arrays as $key => $value)
		{
			$k = isset( $prefix ) ? $prefix . '[' . $key . ']' : $key;

			if(is_array($value))
			{
				static::http_build_query_for_curl($value, $new, $k);
			}
			else
			{
				$new[$k] = $value;
			}
		}
	}
}