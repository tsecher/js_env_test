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
bimMix.getMix().disableSuccessNotifications();


if (process.argv.indexOf('--watch') > -1 ){

	var bs = require("browser-sync").create();
	var portfinder = require('portfinder');

	portfinder.basePort = 3000;
	portfinder.getPort(function (err, port) {
		if (err) { throw err; }

		// .init starts the server
		bs.init({
			server: "../",
			port: port
		});

		['../**/*.html', "../dev/**/*.css", "../dev/**/*.js"].forEach(
			(pattern) => {
				bs.watch(pattern).on('change', bs.reload);
			}
		)
	});
}
