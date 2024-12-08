<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="./styles/contact_me.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <a href="index.php" class="return-button">Return</a>
            <h1>Contact Me</h1>
            <form id="contactForm" action="#" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <span class="error-message" id="nameError"></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <span class="error-message" id="emailError"></span>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    <span class="error-message" id="messageError"></span>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>

        <footer>
            <div class="footer_text">
            <p>© <span id="copyright"></span> JHJ™. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    <script>

        const date = new Date().getFullYear();
        const copyTag = document.getElementById("copyright");

        copyTag.innerHTML = date;

        document.getElementById('contactForm').addEventListener('submit', function(event) {
            let valid = true;

            document.getElementById('nameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('messageError').textContent = '';

            const name = document.getElementById('name').value;
            if (name.trim() === '') {
                document.getElementById('nameError').textContent = 'Name is required.';
                valid = false;
            }

            const email = document.getElementById('email').value;
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address.';
                valid = false;
            }

            const message = document.getElementById('message').value;
            if (message.trim() === '') {
                document.getElementById('messageError').textContent = 'Message is required.';
                valid = false;
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    </script>
</body>
</html>