// For node.js

var XMLHttpRequest = require('xhr2');

const getTodos = () => {
    const request = new XMLHttpRequest();
    request.addEventListener('readystatechange', () => {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseText);
        } else if (request.readyState === 4) {
            console.log("Không nhận được dữ liệu từ server!");
        }
    });
    request.open('GET', 'https://jsonplaceholder.typicode.com/todos/');
    request.send();
};

getTodos();