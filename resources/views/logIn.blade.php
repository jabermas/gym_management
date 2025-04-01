<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .social-icons a {
            margin: 0 10px;
            color: #333;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container-box">
        <h2 id="formTitle">Sign In</h2>
        <div class="social-icons my-3">
            <a href="#"><i class="fab fa-google"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p>or use your email</p>
        
        <form id="authForm">
            <div class="mb-3">
                <input type="text" id="nameField" class="form-control" placeholder="Name" style="display: none;">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </form>
        <p class="mt-3" id="toggleText">Don't have an account? <a href="#" id="toggleBtn">Sign Up</a></p>
    </div>
    
    <script>
        const toggleBtn = document.getElementById("toggleBtn");
        const formTitle = document.getElementById("formTitle");
        const nameField = document.getElementById("nameField");
        const authForm = document.getElementById("authForm");
        const toggleText = document.getElementById("toggleText");
        
        toggleBtn.addEventListener("click", function () {
            if (nameField.style.display === "none") {
                nameField.style.display = "block";
                formTitle.innerText = "Sign Up";
                toggleText.innerHTML = 'Already have an account? <a href="#" id="toggleBtn">Sign In</a>';
            } else {
                nameField.style.display = "none";
                formTitle.innerText = "Sign In";
                toggleText.innerHTML = 'Don\'t have an account? <a href="#" id="toggleBtn">Sign Up</a>';
            }
        });
    </script>
</body>
</html>
