
var exec = require('child_process');

// Console.
const show = (data) => {
	console.log(`${data}`);
}
const server = exec.exec('node http-server.js');
// server.stdout.on('data', show);
// server.stderr.on('data', show);

const watch = exec.exec('npm run watch');
watch.stdout.on('data', show);
watch.stderr.on('data', show);
