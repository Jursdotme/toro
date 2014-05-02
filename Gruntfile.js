/*!
 * Toro Gruntfile
 * http://jurs.me
 * @author Rasmus Jürs
 */

'use strict';

/**
 * Grunt Module
 */
module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
	  // Package
	  pkg: grunt.file.readJSON('package.json'),

	  // Project object
	  project: {
		  app: 'toro',
		  sass: [
		    '<%= project.src %>sass'
		  ],
		  css: [
		    '<%= project.src %>stylesheets'
		  ],
		  bootstrap_scripts: [
		    'bower_components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/'
		  ],
		  bower: [
		    'bower_components'
		  ]
		},

		tag: {
		  banner: '/*!\n' +
		          ' * <%= pkg.name %>\n' +
		          ' * <%= pkg.title %>\n' +
		          ' * <%= pkg.url %>\n' +
		          ' * @author <%= pkg.author %>\n' +
		          ' * @version <%= pkg.version %>\n' +
		          ' * <%= pkg.license %> licensed.\n' +
		          ' */\n'
		},

    /*========================================
    =                ImageMin                =
    ========================================*/

    imagemin: {
      dynamic: {                         // Another target
        files: [{
          expand: true,                  // Enable dynamic expansion
          cwd: 'img/org/',                   // Src matches are relative to this path
          src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'img/min/'                  // Destination path prefix
        }]
      }
    },

    /*---------  End of ImageMin  ----------*/

		/*========================================
		=            Stylesheet stuff            =
		========================================*/

		// SASS
		sass: {
			options: {
		      style: 'expanded',
		      banner: '<%= tag.banner %>',
		      compass: false,
		      quiet: true
		    },
		  all: {
		    files: {
		      '<%= project.css %>/build/global.css': '<%= project.sass %>/style.scss',
		      '<%= project.css %>/build/backend.css': '<%= project.sass %>/themes/backend.scss'
		    }
		  },
		},

		// CSS AUTOPREFIXER
		autoprefixer: {
	    options: {
	      cascade: true,
	      browsers: ['last 2 version', 'ie 8', 'ie 9']
	    },
	    all: {
	      options: {
	        // Target-specific options go here.
	      },
	      expand: true,
    		ext: '.autoprefixed.css',
    		cwd: '<%= project.css %>/build/',
	      src: ['*.css', '!*.autoprefixed.css'],
	     	dest: '<%= project.css %>/build/autoprefixed/'
	    }
	  },

	  // CSS MINIFIER
		cssmin : {
			options: {
	      // report: 'gzip'
	    },
      css:{
    		expand: true,
    		ext: '.min.css',
      	cwd: '<%= project.css %>/build/autoprefixed/',
        src: ['*.autoprefixed.css', '!*.min.css'],
        dest: '<%= project.css %>/build/min/'
      }
    },

    // CSS TO SCSS
    //copy all css files to sass directory, and rename to .scss
		copy: {
		  OwlCarousel: {
		    files: [
		      {
		        expand: true,
		        cwd: 'bower_components/OwlCarousel/owl-carousel',
		        src: ['**/*.css'],
		        dest: 'sass/vendors/owlcarousel/',
		        rename: function(dest, src) {
		          return dest + src.replace(/\.css$/, ".scss");
		        }
		      }
		    ]
		  },
		  fancybox: {
		    files: [
		      {
		        expand: true,
		        cwd: 'bower_components/fancybox/source',
		        src: ['**/*.css'],
		        dest: 'sass/vendors/fancybox/',
		        rename: function(dest, src) {
		          return dest + src.replace(/\.css$/, ".scss");
		        }
		      }
		    ]
		  }
		},

		/*-----  End of Stylesheet stuff  ------*/

		/*========================================
		=            Javascript Stuff            =
		========================================*/

		// Concatinate javascripts.
		concat: {
	    options: {
	      separator: ';'
	    },
	    dist: {
	      src: [

	      	// Conditionizr
          // '<%= project.bower %>/conditionizr/dist/conditionizr.js',
          // Conditionizr - Detects
            // '<%= project.bower %>/conditionizr/detects/chrome.js',
            // '<%= project.bower %>/conditionizr/detects/chromium.js',
            // '<%= project.bower %>/conditionizr/detects/firefox.js',
            // '<%= project.bower %>/conditionizr/detects/ie6.js',
            // '<%= project.bower %>/conditionizr/detects/ie7.js',
            // '<%= project.bower %>/conditionizr/detects/ie8.js',
            // '<%= project.bower %>/conditionizr/detects/ie9.js',
            // '<%= project.bower %>/conditionizr/detects/ie10.js',
            // '<%= project.bower %>/conditionizr/detects/ie10touch.js',
            // '<%= project.bower %>/conditionizr/detects/ie11.js',
            // '<%= project.bower %>/conditionizr/detects/ios.js',
            // '<%= project.bower %>/conditionizr/detects/linux.js',
            // '<%= project.bower %>/conditionizr/detects/mac.js',
            // '<%= project.bower %>/conditionizr/detects/opera.js',
            // '<%= project.bower %>/conditionizr/detects/retina.js',
            // '<%= project.bower %>/conditionizr/detects/safari.js',
            // '<%= project.bower %>/conditionizr/detects/touch.js',
            // '<%= project.bower %>/conditionizr/detects/windows.js',
            // '<%= project.bower %>/conditionizr/detects/winPhone7.js',
            // '<%= project.bower %>/conditionizr/detects/winPhone75.js',
            // '<%= project.bower %>/conditionizr/detects/winPhone8.js',

            // 'javascripts/conditionizr/conditionizr_setup.js',

	      	// Modernizr
	      	'<%= project.bower %>/modernizr/modernizr.js',

		      // Bootstrap
					// '<%= project.bootstrap_scripts %>/affix.js',
					'<%= project.bootstrap_scripts %>/alert.js',
					'<%= project.bootstrap_scripts %>/button.js',
					// '<%= project.bootstrap_scripts %>/carousel.js',
					// '<%= project.bootstrap_scripts %>/collapse.js',
					'<%= project.bootstrap_scripts %>/dropdown.js',
					'<%= project.bootstrap_scripts %>/modal.js',
					// '<%= project.bootstrap_scripts %>/scrollspy.js',
					// '<%= project.bootstrap_scripts %>/tab.js',
					// '<%= project.bootstrap_scripts %>/transition.js',
					'<%= project.bootstrap_scripts %>/tooltip.js',
					// '<%= project.bootstrap_scripts %>/popover.js',

					// Isotope
					'<%= project.bower %>/isotope/dist/isotope.pkgd.min.js',

          // imagesLoaded
          '<%= project.bower %>/imagesloaded/imagesloaded.pkgd.js',


					// Owl Carousel
					'<%= project.bower %>/owlcarousel/owl-carousel/owl.carousel.js',

          // matchHeight
          '<%= project.bower %>/matchHeight/jquery.matchHeight.js',

					// Fancybox 2
					'/fancybox/lib/jquery.mousewheel-3.0.6.pack.js',
					'<%= project.bower %>/fancybox/source/jquery.fancybox.pack.js',
					'<%= project.bower %>/fancybox/source/helpers/jquery.fancybox-buttons.js',
					'<%= project.bower %>/fancybox/source/helpers/jquery.fancybox-media.js',
					'<%= project.bower %>/fancybox/source/helpers/jquery.fancybox-thumbs.js',

					'javascripts/scripts.js'
				],
	      dest: '<%= project.src %>javascripts/build/global.js',
	    },
	  },

	  // Uglify global.js
		uglify: {
		  all: {
		  	options: {
		  		// report: 'gzip'
		  	},
		    files: {
	        '<%= project.src %>javascripts/build/global.min.js': ['<%= project.src %>javascripts/build/global.js']
	      }
		  }
		},


		/*-----  End of Javascript Stuff  ------*/



		/*===================================
		=            The Watcher            =
		===================================*/

		// WATCH
		watch: {

			// Reloads of the GruntFile.js is changed.
			configFiles: {
		    files: [ 'Gruntfile.js'],
		    options: {
		      reload: true,
		      spawn: false
		    }
		  },
		  // Watch for changes to SCSS files.
		  sass_all: {
		  	options: {
					livereload: true
				},
		    files: '<%= project.sass %>/{,*/}*.{scss,sass}',
		    tasks: ['sass:all','autoprefixer:all','cssmin:css']
		  },
		  javascripts: {
      files: ['<%= project.bower %>/{,*/}*.js', '<%= project.src %>javascripts/*.js'],
		  	tasks: ['concat:dist', 'uglify:all']
		  }
      ,
      conditionizr: {
      files: ['<%= project.bower %>/{,*/}*.js', '<%= project.src %>javascripts/conditionizr/*.js'],
        tasks: ['concat:dist', 'uglify:all']
      }
		},

		/*-----  End of The Watcher  ------*/



	});

	// USE MATCHDEP TO DYNAMICALY LOAD PLUGINS
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	/**
	 * Default task
	 * Run `grunt` on the command line
	 */
	grunt.registerTask('default', [
	  'copy',
	  'sass:all',
	  'autoprefixer:all',
	  'cssmin:css',
	  'concat:dist',
	  'uglify:all',
	  'watch'
	]);

  grunt.registerTask('optimize', ['imagemin']);

};
