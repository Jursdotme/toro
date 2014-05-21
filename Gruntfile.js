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
      javascripts: [
        '<%= project.src %>/javascripts/build/'
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
		=            Stylesheet stuff            =
		========================================*/

    mkdir: {
      all: {
        options: {
          create: ['<%= project.sass %>/vendors/fancybox', '<%= project.sass %>/vendors/OwlCarousel']
        },
      },
    },

    // Convert CSS TO SCSS
    "sass-convert" : {
      options: {
        from: 'css',
        to: 'scss'
      },
      fancybox: {
        cwd: '<%= project.bower %>/fancybox/source/',
        src: ['*.css','*/*.css'],
        filePrefix: '_',
        dest: '<%= project.sass %>/vendors/fancybox'
      },
      owlcarousel: {
        cwd: '<%= project.bower %>/OwlCarousel/owl-carousel/',
        src: ['*.css','*/*.css'],
        filePrefix: '_',
        dest: '<%= project.sass %>/vendors/OwlCarousel'
      }
    },

		// SASS
		sass: {
			options: {
		      style: 'expanded',
		      banner: '<%= tag.banner %>',
		      compass: false,
		      quiet: true,
          lineNumbers: true
		    },
		  frontend: {
		    files: {
		      '<%= project.css %>/global.css': '<%= project.sass %>/style.scss'
		    }
		  },
      backend: {
        files: {
          '<%= project.css %>/backend.css': '<%= project.sass %>/themes/backend.scss'
        }
      },
		},

		// CSS AUTOPREFIXER
		autoprefixer: {
	    options: {
	      cascade: true,
	      browsers: ['last 2 version', 'ie 8', 'ie 9'],
	    },
	    all: {
	      options: {
	        // Target-specific options go here.
	      },
	      expand: true,
    		ext: '.autoprefixed.css',
    		cwd: '<%= project.css %>/',
	      src: ['*.css', '!*.autoprefixed.css', '!*.min.css'],
	      dest: '<%= project.css %>/'
	    },
      dev: {
        options: {
          // Target-specific options go here.
        },
        expand: true,
        ext: '.css',
        cwd: '<%= project.css %>/',
        src: ['*.css', '!*.autoprefixed.css', '!*.min.css'],
        dest: '<%= project.css %>/'
      },
      backend: {
        options: {
          // Target-specific options go here.
        },
        expand: true,
        ext: '.autoprefixed.css',
        cwd: '<%= project.css %>/',
        src: 'backend.css',
        dest: '<%= project.css %>/'
      }
	  },

	  // CSS MINIFIER
		cssmin : {
			options: {
	      report: 'gzip',
	    },
      css:{
    		expand: true,
    		ext: '.min.css',
      	cwd: '<%= project.css %>/',
        src: ['*.autoprefixed.css', '!*.min.css',],
        dest: '<%= project.css %>/'
      },
      backend:{
        expand: true,
        ext: '.min.css',
        cwd: '<%= project.css %>/',
        src: 'backend.autoprefixed.css',
        dest: '<%= project.css %>/'
      }
    },

    bless: {
      css: {
        options: {},
        files: {
          'tmp/above-limit.css': 'test/input/global.css'
        }
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
					'<%= project.bootstrap_scripts %>/collapse.js',
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
	      dest: '<%= project.src %>javascripts/build/global.concat.js',
	    },
	  },

	  // Uglify global.js
		uglify: {
		  all: {
		  	options: {
		  		report: 'gzip'
		  	},
		    files: {
	        '<%= project.src %>javascripts/build/global.js': ['<%= project.src %>javascripts/build/global.concat.js']
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
		      reload: false,
		      spawn: false
		    }
		  },
		  // Watch for changes to SCSS files.
		  sass_all: {
		  	options: {
					livereload: true
				},
      files: '<%= project.sass %>/{,*/}{,*/}*.{scss,sass}',
		    tasks: [
          'sass:frontend',
          'autoprefixer:dev',
          'rename:mintonone',
        ]
		  },
		  javascripts: {
      files: ['<%= project.bower %>/{,*/}*.js', '<%= project.src %>javascripts/*.js'],
		  	tasks: [
          'concat:dist',
          'rename:concattonone',
        ]
		  }
      ,
      conditionizr: {
      files: ['<%= project.bower %>/{,*/}*.js', '<%= project.src %>javascripts/conditionizr/*.js'],
        tasks: ['concat:dist', 'uglify:all']
      }
		},

		/*-----  End of The Watcher  ------*/

    // CLEAN

    clean: {
      all: {
        src: ["<%= project.css %>", "<%= project.src %>javascripts/build/"]
      },
      frontend: {
        src: ["<%= project.css %>/global.css", "<%= project.src %>javascripts/build/"]
      },
      backend: {
        src: ["<%= project.css %>/backend.css"]
      },
      globalcss: {
        src: ["<%= project.css %>/global.css"]
      },
      unused: {
        src: ["<%= project.css %>/global.autoprefixed.css", "<%= project.css %>/global.min.css", "<%= project.src %>javascripts/build/global.concat.js", "<%= project.css %>/backend.min.css", "<%= project.css %>/backend.autoprefixed.css"]
      }
    },

    rename: {
      options : {
        ignore: true
      },
      mintonone: {
          src: '<%= project.css %>/global.min.css',
          dest: '<%= project.css %>/global.css'
      },
      concattonone: {
          src: '<%= project.src %>javascripts/build/global.concat.js',
          dest: '<%= project.src %>javascripts/build/global.js'
      },
      backend: {
          src: "<%= project.css %>/backend.min.css",
          dest: "<%= project.css %>/backend.css"
      },
    },

	});

	// USE MATCHDEP TO DYNAMICALY LOAD PLUGINS
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	/**
	 * Default task
	 * Run `grunt` on the command line
	 */
	grunt.registerTask('default', [
    'clean:frontend',
    'mkdir',
    'sass-convert',
    'sass:frontend',
    'autoprefixer:dev',
    'rename:mintonone',
    'concat:dist',
    'rename:concattonone',
    'clean:unused',
    'watch',
	]);

  grunt.registerTask('build', [
    'clean:frontend',
    'mkdir',
    'sass-convert',
    'sass:frontend',
    'autoprefixer:dev',
    'rename:mintonone',
    'concat:dist',
    'rename:concattonone',
    'clean:unused',
  ]);

  grunt.registerTask('release', [
    'clean:frontend',
    'mkdir',
    'sass-convert',
    'sass:frontend',
    'autoprefixer:all',
    'cssmin:css',
    'clean:globalcss',
    'rename:mintonone',
    'concat:dist',
    'uglify:all',
    'clean:backend',
    'sass:backend',
    'autoprefixer:backend',
    'cssmin:backend',
    'clean:backend',
    'rename:backend',
    'clean:unused',
  ]);

  grunt.registerTask('dev', [
    'clean:frontend',
    'mkdir',
    'sass-convert',
    'sass:frontend',
    'autoprefixer:dev',
    'rename:mintonone',
    'concat:dist',
    'rename:concattonone',
    'clean:unused',
  ]);

  grunt.registerTask('backend', [
    'clean:backend',
    'sass:backend',
    'autoprefixer:backend',
    'cssmin:backend',
    'clean:backend',
    'rename:backend',
    'clean:unused',
  ]);

  grunt.registerTask('clean-all', [
    'clean:all',
  ]);

  grunt.registerTask('setup', [
    'clean:all',
    'mkdir',
    'sass-convert',
    'sass:frontend',
    'autoprefixer:dev',
    'rename:mintonone',
    'concat:dist',
    'rename:concattonone',
    'clean:unused',
  ]);

};
