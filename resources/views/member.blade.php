<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Active Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                <li><a href="{{ url('/register') }}" class="nav-link text-white">Registration</a></li>
                <li><a href="{{ url('/members') }}" class="nav-link active bg-light text-dark">View Members</a></li>
                <li><a href="{{('/coaches')}}" class="nav-link text-white">Coaches</a></li>
            </ul>
            <div class="mt-auto">
                <a href="{{ url('logIn') }}" class="nav-link text-white">Logout</a>
                @csrf
            </div>
        </div>

    <div class="container-fluid p-4 d-flex flex-column" style="height: 100vh; overflow-y: hidden;">
        <div class="card shadow-lg p-4 mt-3 border-0 flex-grow-1 d-flex flex-column">
            <h2 class="fw-bold text-center">List of Members</h2>
            <div class="table-responsive" style="flex-grow: 1; overflow-y: auto; max-height: 800px;">
                <table class="table table-hover text-center">
                    <thead class="bg-transparent text-dark">
                        <tr>
                            <th>Name</th>
                            <th>Member ID</th>
                            <th>Date Enrolled</th>
                            <th>Plan</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->date_of_joined }}</td>
                            <td>{{ $member->plan }}</td>
                            <td>₱{{ number_format($member->price, 2) }}</td>
                            <td>
                                <button class="btn btn-outline-dark btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal"
                                        data-id="{{ $member->id }}"
                                        data-name="{{ $member->name }}"
                                        data-date="{{ $member->date_of_joined }}"
                                        data-plan="{{ $member->plan }}"
                                        data-price="{{ $member->price }}">
                                    Edit
                                </button>
                                <form action="/members/{{ $member->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="memberId" name="id">
                        <div class="mb-3">
                            <label for="memberName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="memberName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberDate" class="form-label">Date Enrolled</label>
                            <input type="date" class="form-control" id="memberDate" name="date_of_joined" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberPlan" class="form-label">Plan</label>
                            <select class="form-select" id="memberPlan" name="plan" required>
                                <option value="Basic">Basic - ₱500/month</option>
                                <option value="Standard">Standard - ₱800/month</option>
                                <option value="Premium">Premium - ₱1500/month</option>
                                <option value="VIP">VIP - ₱3000/month</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="memberPrice" class="form-label">Price</label>
                            <input type="text" class="form-control" id="memberPrice" name="price" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let editModal = document.getElementById('editModal');

            editModal.addEventListener('show.bs.modal', function(event) {
                let button = event.relatedTarget;
                let id = button.getAttribute('data-id');
                let name = button.getAttribute('data-name');
                let date = button.getAttribute('data-date');
                let plan = button.getAttribute('data-plan');
                let price = button.getAttribute('data-price');

                document.getElementById('editForm').setAttribute('action', `/members/${id}`);
                document.getElementById('memberId').value = id;
                document.getElementById('memberName').value = name;
                document.getElementById('memberDate').value = date;
                document.getElementById('memberPlan').value = plan;
                document.getElementById('memberPrice').value = price;
            });

            document.getElementById('memberPlan').addEventListener('change', function() {
                let prices = {
                    "Basic": 500,
                    "Standard": 800,
                    "Premium": 1500,
                    "VIP": 3000
                };
                document.getElementById('memberPrice').value = prices[this.value];
            });
        });
    </script>

</body>
</html>
