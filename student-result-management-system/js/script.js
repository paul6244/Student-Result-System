function addStudent() {
    const name = document.getElementById('name').value;
    const roll_number = document.getElementById('roll_number').value;

    // Make an AJAX request to add student to the database
    fetch('add_student.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, roll_number })
    })
    .then(response => response.json())
    .then(data => alert(data.message))
    .catch(error => console.error('Error:', error));
}
function addResult() {
    const student_id = document.getElementById('student_id').value;
    const subject = document.getElementById('subject').value;
    const marks = document.getElementById('marks').value;

    // Check if all fields are filled
    if (!student_id || !subject || !marks) {
        alert("Please fill all fields");
        return;
    }

    // Make an AJAX request to add result to the database
    fetch('add_result.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ student_id, subject, marks })
    })
    .then(response => response.json())
    .then(data => alert(data.message))
    .catch(error => console.error('Error:', error));
}


