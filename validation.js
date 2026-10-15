document.addEventListener("DOMContentLoaded", function () {

    // Registration Form Validation
    const registerForm = document.getElementById("registerForm");

    if (registerForm) {
        registerForm.addEventListener("submit", function (event) {

            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;

            if (name === "" || email === "" || password === "") {
                alert("Please fill in all fields.");
                event.preventDefault();
                return;
            }

            if (password.length < 6) {
                alert("Password must contain at least 6 characters.");
                event.preventDefault();
                return;
            }
        });
    }

    // Complaint Form Validation
    const complaintForm = document.getElementById("complaintForm");

    if (complaintForm) {
        complaintForm.addEventListener("submit", function (event) {

            const title = document.getElementById("title").value.trim();
            const category = document.getElementById("category").value;
            const description = document.getElementById("description").value.trim();

            if (title === "" || category === "" || description === "") {
                alert("Please fill in all complaint details.");
                event.preventDefault();
                return;
            }

            if (title.length > 200) {
                alert("Title must not exceed 200 characters.");
                event.preventDefault();
            }
        });
    }

});