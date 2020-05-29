/**
 * Available variables :
 * - mix: The mix instance.
 * - bimMix: The MixEasyStructure instance.
 *
 * This file is processed before the call of bimMix.process. So you can define your own
 * mix manipulation, and your own bimMix manipulation.
 *
 * Don't forget that it is a bimMixStructure hook so, if you want to override the full
 * bimMixStructure process function here, you'd better not use easyStructure...
 */
const bimMix = require('bim-mix');

// Disable mix notification.
// bimMix.getMix().disableNotifications();

// Enable live reload.
// const LiveReloadPlugin = require('webpack-livereload-plugin');
// bimMix.getMix().webpackConfig({
// 	plugins: [
// 		new LiveReloadPlugin()
// 	]
// });
const fs = require("fs");
const conf = JSON.parse(fs.readFileSync('./http-server.json', 'utf8'));
bimMix.getMix().browserSync(conf.url);

