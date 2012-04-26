<?php

function ssl_support()
{
	$CI =& get_instance();
    return $CI->config->item('ssl_support');
}

if ( ! function_exists('force_ssl'))
{
	function force_ssl()
	{
		print_r($_SERVER);
		print_r($CI->config->config['base_url']);
		
		if (ssl_support() &&  (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'))
		{
			$CI =& get_instance();
			$checkreplace =  $CI->config->config['base_url'];
			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
			// If we are already on HTTPS and if the Server Variable is not set properly , then avoid endless redirection by checking if there is any change in the url.
			if(strcmp($checkreplace, $CI->config->config['base_url']))
			{
					print_r($CI->config->config['base_url']);
					die;

				redirect($CI->uri->uri_string());
			}
			print_r($CI->config->config['base_url']);
			die;

		}

	}
}

//thanks C4iO [PyroDEV]
if ( ! function_exists('remove_ssl'))
{
	function remove_ssl()
	{	
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
		{
			$CI =& get_instance();
			$CI->config->config['base_url'] = str_replace('https://', 'http://', $CI->config->config['base_url']);
			
			redirect($CI->uri->uri_string());
		}
	}
}