let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .addEntry('style', './assets/scss/main.scss')
    .enableSassLoader()
    .createSharedEntry('vendor', [
        'jquery',
    ]);

module.exports = Encore.getWebpackConfig()