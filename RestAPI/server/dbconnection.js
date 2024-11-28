var mysql = require('mysql');
var port = process.env.PORT || 4205;

if (port === 4205) {
    var connection = mysql.createConnection({
        host: 'localhost',
        port: 3306,
        user: 'root',
        password: '',
        database: 'test',
        insecureAuth: true
    });
} else {
    // live server here...
}

connection.connect();

module.exports = connection;