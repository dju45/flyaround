let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .addEntry('style', './assets/scss/main.scss')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .autoProvidejQuery()
    .enableSassLoader(function(sassOptions) {}, {
            resolveUrlLoader: false
     });

module.exports = Encore.getWebpackConfig()