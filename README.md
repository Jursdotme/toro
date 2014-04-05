# [Toro Theme](http://jurs.me)

## Requirements

Toro requires a few thing to work:

- [Node.js](http://nodejs.org/)
- [Bower](http://bower.io/)
- [Grunt](http://gruntjs.com/)

## Installation

### Installing Node.js

Download the installer from [here](http://nodejs.org/download/) and you are ready to go.

### Installing Bower

Bower depends on [Node](http://nodejs.org/) and [npm](http://npmjs.org/). It's installed globally using npm:

```
npm install -g bower
```

Also make sure that git is installed as some bower packages require it to be fetched and installed.

### Installing Grunt

Installing the CLI

**If you're upgrading from Grunt 0.3, please see [Grunt 0.3 Notes](http://gruntjs.com/upgrading-from-0.3-to-0.4#grunt-0.3-notes)**

In order to get started, you'll want to install Grunt's command line interface (CLI) globally. You may need to use sudo (for OSX, *nix, BSD etc) or run your command shell as Administrator (for Windows) to do this.

```
npm install -g grunt-cli
```

This will put the ```grunt``` command in your system path, allowing it to be run from any directory.

Note that installing ```grunt-cli``` does not install the Grunt task runner! The job of the Grunt CLI is simple: run the version of Grunt which has been installed next to a ```Gruntfile```. This allows multiple versions of Grunt to be installed on the same machine simultaneously.

## Usage

Assuming that the stuff above has been installed you should be able to follow these steps to start working with Toro:

1. Fire up Terminal
2. Change to the project's root directory.
3. Install Toro dependancies with ```bower install```
3. Install grunt project dependencies with ```npm install```.
4. Copy and convert flexbox and owlcarousel styles with```grunt copy```
4. Run Grunt with ```grunt```.

That's really all there is to it. Grunt is now listening to changes in sass and javascript files and compiles, concatenates, minifies and outputs the necessary files.

Next time you return to the project you only need to run ```grunt``` (step 5) make grunt watch the project again.