CakePHP-Knockback-Plugin
========================

CakePHP Knockback plugin

## Dependencies

In order to have the base files automatically loaded you need to install Mark Story's excellent 'Asset Compress' plugin

AssetCompress is available at [github](http://github.com/markstory/asset_compress)


### Installation

#### Classic libraries loading

In your bootstrap.php make sure you include the plugin

	CakePlugin::load('Knockback');

Make sure you add set the correct files in  your compress_asset.ini
This asset compress config also stored in Config folder of knockback plugin.

	[js]
	paths[] = APP/Plugin/Knockback/

	[knockback-base-release.js]
	files[] = jquery/jquery.min.js
	files[] = underscore/underscore.min.js
	files[] = backbone/backbone.min.js
	files[] = knockout/knockout.min.js
	files[] = knockback/knockback.min.js

	[knockback-base-develop.js]
	files[] = jquery/jquery.min.js
	files[] = underscore/underscore.js
	files[] = backbone/backbone.js
	files[] = knockout/knockout.min.js
	files[] = knockback/knockback.js

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

	
#### Libraries loading using  Asynchronous Module Definition with RequireJS.

In webroot/js/sample/requirejs.loader.js provided loader for RequireJS that describe all libraries locations.

RequireJS initialized using next script:

	<script data-main="js/requirejs.loader" src="/knockback/js/requirejs/require.js"></script> 
	
