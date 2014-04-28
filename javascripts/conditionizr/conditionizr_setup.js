conditionizr.config({
      assets: '/assets/conditionizr/',
      tests: {
        'chrome': ['class'],
        'chromium': ['class'],
        'firefox': ['class'],
        'ie6': ['class'],
        'ie7': ['class'],
        'ie8': ['class'],
        'ie9': ['class'],
        'ie10': ['class'],
        'ie10touch': ['class'],
        'ie11': ['class'],
        'ios': ['class'],
        'linux': ['class'],
        'mac': ['class'],
        'opera': ['class'],
        'retina': ['class'],
        'safari': ['class'],
        'touch': ['class'],
        'windows': ['class'],
        'winPhone7': ['class'],
        'winPhone75': ['class'],
        'winPhone8': ['class']
      }
    });

    // Add html5shiv to depricated browsers
    conditionizr.polyfill('//html5shiv.googlecode.com/svn/trunk/html5.js', ['ie6', 'ie7', 'ie8']);
