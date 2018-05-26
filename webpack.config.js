var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications();

module.exports = Encore.getWebpackConfig();