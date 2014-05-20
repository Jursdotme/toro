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

## Adding packages with bower

Using a local or remote package

```
bower install <package>
```
Installing a local or remote package and add it into the project's bower.json dependencies

```
bower install <package> -save
```

Using a specific version of a package

```
bower install <package>#<version>
```

Using a different name and a specific version of a package

```
bower install <name>=<package>#<version>
```

Where ```<package>``` can be any one of the following:

- A name that maps to a package registered with Bower, e.g, ```jquery```. ‡
- A public remote Git endpoint, e.g., ```git://github.com/someone/some-package.git```. ‡
- A private Git repository, e.g., ```https://github.com/someone/some-package.git```. If the protocol is https, a prompt will ask for the credentials. ssh can also be used, e.g., ```git@github.com:someone/some-package.git``` and can authenticate with the user's ssh public/private keys. ‡
- A local endpoint, i.e., a folder that's a Git repository. ‡
- A public remote Subversion endpoint, e.g., ```svn+http://package.googlecode.com/svn/```. ‡
- A private Subversion repository, e.g., ```svn+ssh://package.googlecode.com/svn/```. ‡
- A local endpoint, i.e., a folder that's an Subversion repository, e.g., ```svn+file:///path/to/svn/```. ‡
- A shorthand endpoint, e.g., ```someone/some-package``` (defaults to GitHub). ‡
- A URL to a file, including ```zip``` and ```tar``` files. Its contents will be extracted.

‡ These types of ```<package>``` might have versions available. You can specify a [semver](http://semver.org/) compatible version to fetch a specific release, and lock the package to that version. You can also specify a [range](https://github.com/isaacs/node-semver#ranges) of versions.

If you are using a package that is a git endpoint, you may use any tag, commit SHA, or branch name as a version. For example: ```<package>#<sha>```. Using branches is not recommended because the HEAD does not reference a fixed commit SHA.

If you are using a package that is a subversion endpoint, you may use any tag, revision number, or branch name as a version. For example: ```<package>#<revision>```.

All package contents are installed in the ```bower_components``` directory by default. You should **never** directly modify the contents of this directory.

Using ```bower list``` will show all the packages that are installed locally.

## Troubleshooting Windows

There are a few additional steps when using grunt on Windows (Vista+).
1. You need to set up Ruby 1.9.3 and use this to install SASS. "Start Command Prompt with Ruby"
2. Set up the correct path and environment variables.
  1. From the Desktop, right-click `My Computer` and click `Properties`.
  2. Click `Advanced System Settings` link in the left column.
  3. In the System Properties window click the `Environment Variables` button.
  4. Under `System Variables` find the `path` variable and add (**Not replace!**) `C:\Program Files\nodejs\;C:\Program Files (x86)\Git\cmd;C:\Ruby193\bin` if it isn't allready there.

After this you should be able to run the grunt commands without problems.
