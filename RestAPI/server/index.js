'use strict';

// Exports by default

module.exports = function (app) {
    var book = require('./controllers/Book');
    var siteRoot = require('./routes/root');

    //Site index
    app.use('/', siteRoot);

    //Books
    app.route('/books').get(book.getAllItems);
    // app.route('/books/id/:rowId')
    //     .get(book.getItemById)
    //     .put(book.updateItem)
    //     .delete(book.deleteItem);
}