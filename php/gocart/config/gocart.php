<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// GoCart Theme
$config['theme']			= 'default';

// SSL support
$config['ssl_support']		= true;

// Business information
$config['company_name']		= $_ENV['OPENSHIFT_APP_NAME'];
$config['address1']			= '1';
$config['address2']			= '2';
$config['country']			= 'IN'; // use proper country codes only
$config['city']				= 'Sga'; 
$config['state']			= 'sdf';
$config['zip']				= '32342';
$config['email']			= 'noreply@selfmail.com';

// Store currency
$config['currency']			= 'USD';  // USD, EUR, etc
$config['currency_symbol']  = '$';

// Shipping config units
$config['weight_unit']	    = 'LB'; // LB, KG, etc
$config['dimension_unit']   = 'IN'; // FT, CM, etc

// site logo path (for packing slip)
$config['site_logo']		= '/images/logo.png';

//change the name of the admin controller folder 
$config['admin_folder']		= 'admin';

//file upload size limit
$config['size_limit']		= intval(ini_get('upload_max_filesize'))*1024;

//are new registrations automatically approved (true/false)
$config['new_customer_status']	= true;

//do we require customers to log in 
$config['require_login']		= true;

//default order status
$config['order_status']			= 'Pending';

// default Status for non-shippable orders (downloads)
$config['nonship_status'] = 'Delivered';

$config['order_statuses']	= array(
	'Pending'  				=> 'Pending',
	'Processing'    		=> 'Processing',
	'Shipped'				=> 'Shipped',
	'On Hold'				=> 'On Hold',
	'Cancelled'				=> 'Cancelled',
	'Delivered'				=> 'Delivered'
);

// enable inventory control ?
$config['inventory_enabled']	= true;

// allow customers to purchase inventory flagged as out of stock?
$config['allow_os_purchase'] 	= true;

//do we tax according to shipping or billing address (acceptable strings are 'ship' or 'bill')
$config['tax_address']		= 'ship';

//do we tax the cost of shipping?
$config['tax_shipping']		= false;
