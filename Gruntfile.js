module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      build: {
        src: [
        'javascripts/foundation.js',
        'javascripts/foundation-forms.js',

        'javascripts/nav.js',

        'javascripts/scripts.js',

        'javascripts/owl.carousel.js',

        'javascripts/bootstrap/affix.js',
        'javascripts/bootstrap/alert.js',
        'javascripts/bootstrap/button.js',
        'javascripts/bootstrap/collapse.js',
        'javascripts/bootstrap/dropdown.js',
        'javascripts/bootstrap/tab.js',
        'javascripts/bootstrap/transition.js',
        'javascripts/bootstrap/scrollspy.js',
        'javascripts/bootstrap/modal.js',
        'javascripts/bootstrap/tooltip.js',
        'javascripts/bootstrap/popover.js',
        ] , //input
        dest: 'javascripts/build/global.min.js' //Output
      }
    },

    compass: {                  // Task
      dist: {                   // Target
        options: {              // Target options
          sassDir: 'sass',
          cssDir: 'stylesheets',
          environment: 'production'
        }
      }
    },
    watch: {
      options: {
        livereload: true,
      },
      scripts: {
        files: ['javascripts/*.js, javascripts/bootstrap/*.js'],
        tasks: ['uglify'],
        options: {
          spawn: false,
        }
      },
      css: {
        files: ['sass/*.scss', 'sass/bootstrap/*.scss'],
        tasks: ['compass'],
        options: {
           spawn: false,  
        }
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // grunt Sass
  grunt.loadNpmTasks('grunt-contrib-compass');
  // Grunt Watch
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['watch']);

};