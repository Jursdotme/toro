module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      build: {
        src: ['javascripts/foundation.js', 'javascripts/foundation-forms.js', 'javascripts/nav.js', 'javascripts/scripts.js', 'javascripts/owl.carousel.js'], //input
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
        files: ['javascripts/*.js'],
        tasks: ['uglify'],
        options: {
          spawn: false,
        }
      },
      css: {
        files: ['sass/*.scss'],
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