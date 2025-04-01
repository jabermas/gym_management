<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <style>
        body {
            background: url('bg-gym.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>

    <div class="d-flex vh-100">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-secondary" style="width: 250px;">
            <div class="text-center mb-3">
                <img src="rendon.jpg" alt="Rendon" height="100px" width="100px" class="rounded-circle">
                <h5 class="mt-2">Rendon Labador</h5>
                <small>rendonlabador@gmail.com</small>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item"><a href="#" class="nav-link text-white">Dashboard</a></li>
                <li><a href="#" class="nav-link text-white">Admin Profile</a></li>
                <li><a href="#" class="nav-link active bg-light text-dark">Registration</a></li>
                <li><a href="{{('/members')}}" class="nav-link text-white">View Members</a></li>
                <li><a href="{{('/coaches')}}" class="nav-link text-white">Coaches</a></li>
            </ul>
            <div class="mt-auto">
                <a href="{{url('logIn')}}" class="nav-link text-white">Logout</a>
                @csrf
            </div>
        </div>

        <div class="container justify-content-center" style="padding-top: 210px; ">
            <div class="card p-5 shadow-lg w-70 h-70">
                <h2 class="fw-bold text-center mb-4">Register Participant</h2>
                <form action="{{url('/register')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Name of Participant</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Date of Join</label>
                            <input type="date" name="date_of_join" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Contact No.</label>
                            <input type="text" name="contact" class="form-control" placeholder="Enter contact number" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Plan</label>
                            <select name="plan" id="plan" class="form-select" required>
                                <option value="" disabled selected>Select a Plan</option>
                                <option value="Basic" data-price="500">Basic - ₱500/month</option>
                                <option value="Standard" data-price="800">Standard - ₱800/month</option>
                                <option value="Premium" data-price="1500">Premium - ₱1500/month</option>
                                <option value="VIP" data-price="3000">VIP - ₱3000/month</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Auto-filled based on plan" readonly>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-primary px-4 py-2 p-3 fw-bold">Register</button>
                        <button type="reset" class="btn btn-outline-secondary px-4 py-2">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('plan').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let price = selectedOption.getAttribute('data-price');
            document.getElementById('price').value = `${price}`;
        });

        document.getElementById('resetButton').addEventListener('click', function() {
            document.getElementById("registrationForm").reset();
            document.getElementById('price').value = "";
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
