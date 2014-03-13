'use strict';
var util = require('util');
var path = require('path');
var yeoman = require('yeoman-generator');
var chalk = require('chalk');
var git = require('simple-git')();


var XplorepressGenerator = yeoman.generators.Base.extend({
    init: function () {
        this.pkg = require('../package.json');

        this.on('end', function () {
            if (!this.options['skip-install']) {
                //this.installDependencies();
            }
        });
    },

    askFor: function () {
        var done = this.async();

        // have Yeoman greet the user
        this.log(this.yeoman);

        // replace it with a short and sweet description of your generator
        this.log(chalk.magenta('You\'re using the fantastic XplorePress generator.'));

        var prompts = [{
            name: 'wpVersion',
            message: 'What version of WordPress do you want to use?',
            default: '3.8.1'
        }, {
            type: 'confirm',
            name: 'useVagrant',
            message: 'Do you want to use Vagrant?',
            default: true
        }];

        this.prompt(prompts, function (props) {
            this.wpVersion = props.wpVersion;
            this.useVagrant = props.useVagrant;

            done();
        }.bind(this));
    },

    askVagrant: function() {
        if (!this.useVagrant) {
            return;
        }

        var done = this.async();

        var prompts = [{
            name: 'vagrantBox',
            message: 'What Vagrant box would you like to use?',
            default: 'xplore/debian-6.0.9'
        }];

        this.prompt(prompts, function (props) {
            this.vagrantBox = props.vagrantBox;

            done();
        }.bind(this));
    },

    gitConfig: function() {
        var done = this.async(),
            me = this;

        me.log(chalk.magenta('Configuring Git'));

        git.init(function (err) {
            if (err) {
                me.log(chalk.red(err));
            }

            done();
        });
    },

    wordpressInstall: function () {
        var done = this.async(),
            me = this;

        this.log(chalk.magenta('Checking out WordPress from GitHub - this may take some time...'));

        git.submoduleAdd('git://github.com/WordPress/WordPress.git', 'httpdocs/wp', function (err) {
            if (err) {
                me.log(chalk.red(err));
                //done(); return;
            }

            me.log(chalk.magenta('Checking out version ' + me.wpVersion));

            git._baseDir = 'httpdocs/wp';
            git.checkout(me.wpVersion, function (err) {
                if (err) {
                    me.log(chalk.red(err));
                    //done(); return;
                }

                done();
            });
        });
    },

    wordpressTheme: function () {
        this.log(chalk.magenta('Copying TwentyFourteen theme'));

        var src = this.destinationRoot() + '/httpdocs/wp/wp-content/themes/twentyfourteen';
        this.directory(src, 'httpdocs/wp-content/themes/twentyfourteen');
    },

    app: function () {
        this.mkdir('httpdocs');
        this.mkdir('httpdocs/wp-content');
        this.mkdir('httpdocs/wp-content/plugins');
        this.mkdir('httpdocs/wp-content/themes');

        this.copy('httpdocs/.htaccess', 'httpdocs/.htaccess');
        this.copy('httpdocs/index.php', 'httpdocs/index.php');
        this.copy('httpdocs/wp-config.php', 'httpdocs/wp-config.php');

        this.copy('silence.php', 'httpdocs/wp-content/index.php');
        this.copy('silence.php', 'httpdocs/wp-content/plugins/index.php');
        this.copy('silence.php', 'httpdocs/wp-content/themes/index.php');
    },

    projectfiles: function () {
        this.template('_gitignore', '.gitignore');
        this.copy('editorconfig', '.editorconfig');
        this.copy('jshintrc', '.jshintrc');
    },

    vagrantFiles: function() {
        if (!this.useVagrant) {
            return;
        }

        this.template('_Vagrantfile', 'Vagrantfile');
        this.directory('puppet', 'puppet');
    },


});

module.exports = XplorepressGenerator;
