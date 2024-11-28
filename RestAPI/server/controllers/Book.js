const { json } = require('express/lib/response');
var db = require('../dbconnection');

// creates class
var Book = {
    getAllItems: function (req, res) {
        let pathname = req.__parsedUrl.pathname.split('/');
        let section = pathname[1];

        var results = db.query('SELECT * FROM ??', [section], function (error, results, fields) {
            if (error) {
                var apiResult = {};

                apiResult.meta = {
                    table: section,
                    type: 'collection',
                    total: 0
                };
                apiResult.data = [];

                res.json(apiResult);
            } else {
                var resultJson = JSON.stringify(results);
                resultJson = JSON.parse(resultJson);
                var apiResult = {};

                apiResult.meta = {
                    table: section,
                    type: 'collection',
                    total: 1,
                    total_entries: 0
                };
                apiResult.data = resultJson;

                res.json(apiResult);
            }
        });
    }
}

module.exports = Book;