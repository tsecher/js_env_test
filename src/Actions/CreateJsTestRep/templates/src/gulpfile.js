/**
 * Load toutes les taches par défaut présente dans lycanthrop_gulp/tasks/*.js
 * @type {TaskLoaderClass}
 */
const taskLoader = require('lycanthrop_gulp/utils/TaskLoader');

// Load les taches par défaut
taskLoader.loadDefaultTasks(exports);

// Définition de la tache par défaut :
exports.default = exports.watch

// Load les taches custom
// taskLoader.loadTasks('./customTasks', exports);