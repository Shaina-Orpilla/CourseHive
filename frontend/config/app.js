document.addEventListener('DOMContentLoaded', () => {
    loadCourses();
});

function showCourseForm() {
    document.getElementById('course-form-section').style.display = 'block';
}

function loadCourses() {
    fetch('src/getCourses.php')
        .then(response => response.json())
        .then(data => {
            const coursesContainer = document.getElementById('courses-container');
            coursesContainer.innerHTML = ''; // Clear existing content
            data.forEach(course => {
                const courseDiv = document.createElement('div');
                courseDiv.classList.add('course-item');
                courseDiv.innerHTML = `
                    <h3>${course.title}</h3>
                    <p>${course.description}</p>
                    <img src="path/to/images/${course.image}" alt="${course.title}" style="max-width: 100px; height: auto;">
                `;
                coursesContainer.appendChild(courseDiv);
            });
        })
        .catch(error => console.error('Error loading courses:', error));
}

function submitCourseForm(event) {
    event.preventDefault();
    const formData = new FormData(document.getElementById('course-form'));

    fetch('src/createCourse.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        document.getElementById('course-form-section').style.display = 'none';
        loadCourses();
    })
    .catch(error => console.error('Error creating course:', error));
}

function formatText(command) {
    document.execCommand(command, false, null);
}