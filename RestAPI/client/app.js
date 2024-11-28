var coursesAPI = 'http://127.0.0.1:5500/RestAPI/server/db.json';

function start() {
    getCourses(renderCourses);

    handleCreateForm();
}

start();

// Functions
function getCourses(callback) {
    fetch(coursesAPI)
        .then(function (response) { //promise
            return response.json();
        })
        .then(callback); //callback
}

function renderCourses(courses) {
    var listCoursesBlock = document.querySelector('#list-courses');
    var html = courses.map(function (course) {
        return `
        <li>
            <h4>${course.name}</h4>
            <p>${course.description}</p>
        </li>
        `
    });
    listCoursesBlock.innerHTML = html.join('');
}

function handleCreateForm() {
    var btn = document.querySelector('#create');

    btn.onclick = function () {
        alert();
    };
}