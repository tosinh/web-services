const express = require('express'); //MVC for creating Node sites
const app = express();
const router = express.Router();
const port = process.env.PORT || 4200;

// Defines a route, usually this would be a bunch of routes imported from another file
router.get('/', function (req, res, next) {
    res.send('Welcome to API');
});

// Adds routes to Express app
router(app);

// Starts Express server on defined port
app.listen(port);

// Logs to console to let us know it's working
console.log('API server: ' + port);