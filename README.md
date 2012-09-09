CakePHP-Knockback-Plugin
========================

CakePHP Knockback plugin

## Dependencies

In order to have the base files automatically loaded you need to install Mark Story's excellent 'Asset Compress' plugin

AssetCompress is available at [github](http://github.com/markstory/asset_compress)


### Installation

In your bootstrap.php make sure you include the plugin

	CakePlugin::load('Knockback');
	
Make sure you add set the correct files in  your compress_asset.ini
This asset compress config also stored in Config folder of knockback plugin.

	[js]
	paths[] = APP/Plugin/Knockback/

	[knockback-base-release.js]
	files[] = jquery-1.8.1.min.js
	files[] = underscore-1.3.3.min.js
	files[] = backbone-0.9.2.min.js
	files[] = knockout-2.1.0.min.js
	files[] = knockback-0.15.4.min.js

	[knockback-base-develop.js]
	files[] = jquery-1.8.1.min.js
	files[] = underscore-1.3.3.js
	files[] = backbone-0.9.2.js
	files[] = knockout-2.1.0.js
	files[] = knockback-0.15.4.js

You can then show that you are going to use the Knockback component and 
asset compress helper in your controllers.

	var $helpers = array('AssetCompress.AssetCompress');
	
	public $components = array (
		'RequestHandler',
		'Knockback.Knockback'
	);

Then add the knockback files to your view or layout.

	<?php echo $this->AssetCompress->script('knockout-base-release'); ?>

Or	

	<?php echo $this->AssetCompress->script('knockout-base-develop'); ?>
