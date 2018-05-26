let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .addEntry('style', './assets/scss/main.scss')
    .createSharedEntry('vendor', [
        'jquery',
        'bootstrap',
    ])
    .enableSassLoader(function(sassOptions) {}, {
            resolveUrlLoader: false
     });

module.exports = Encore.getWebpackConfig()