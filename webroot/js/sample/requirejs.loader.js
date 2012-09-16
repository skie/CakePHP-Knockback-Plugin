require.config({
  paths: {
    jquery: '/knockback/js/jquery/jquery.min',
    underscore: '/knockback/js/underscore/underscore.min',
    backbone: '/knockback/js/backbone/backbone.min',
    knockback: '/knockback/js/knockback/knockback.min',
    knockout: '/knockback/js/knockout/knockout.min'
  },
  shim: {
    underscore: {
      exports: '_'
    },
    backbone: {
      deps: ["underscore", "jquery"],
      exports: "Backbone"
    },
	
    knockout: {
      deps: ["jquery"],
      exports:"ko"
    },
	
    knockback: {
      deps: ["underscore", "jquery", "knockout"],
      exports: "kb"
    }
	
  }
  
});

require ([
  'app'
  ], function(App) {
  return App.initialize();
}); 