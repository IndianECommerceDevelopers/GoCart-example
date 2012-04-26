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
	
		if (ssl_support() && !((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')))
		{
				$CI =& get_instance();
				$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
				echo "Base Url : ".base_url();
				echo "Site Url : ".site_url();
				die;
				redirect($CI->uri->uri_string());
		}
	}
}

//thanks C4iO [PyroDEV]
if ( ! function_exists('remove_ssl'))
{
	function remove_ssl()
	{	
		if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
		{
			$CI =& get_instance();
			$CI->config->config['base_url'] = str_replace('https://', 'http://', $CI->config->config['base_url']);
			
			redirect($CI->uri->uri_string());
		}
	}
}