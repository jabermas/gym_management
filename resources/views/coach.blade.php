<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coaches</title>
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
                <li><a href="{{ url('/members') }}" class="nav-link text-white">View Members</a></li>
                <li><a href="{{ url('/coaches') }}" class="nav-link active bg-light text-dark">Coaches</a></li>
            </ul>
            <div class="mt-auto">
                <a href="{{ url('logIn') }}" class="nav-link text-white">Logout</a>
                @csrf
            </div>
        </div>

        <div class="container-fluid p-4 d-flex flex-column" style="height: 100vh; overflow-y: hidden;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold">Coaches</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCoachModal">Add Coach</button>
            </div>
            <div class="card shadow-lg p-4 mt-3 border-0 flex-grow-1 d-flex flex-column">
                <div class="table-responsive" style="flex-grow: 1; overflow-y: auto; max-height: 800px;">
                    <table class="table table-hover text-center">
                        <thead class="bg-transparent text-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Specialty</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coaches as $coach)
                            <tr>
                                <td>{{ $coach->name }}</td>
                                <td>{{ $coach->email }}</td>
                                <td>{{ $coach->specialty }}</td>
                                <td>
                                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editCoachModal" data-id="{{ $coach->id }}" data-name="{{ $coach->name }}" data-email="{{ $coach->email }}" data-specialty="{{ $coach->specialty }}">Edit</button>
                                    <form action="/coaches/{{ $coach->id }}" method="POST" style="display:inline;">
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
    </div>

    <!-- Add Coach Modal -->
    <div class="modal fade" id="addCoachModal" tabindex="-1" aria-labelledby="addCoachModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCoachModalLabel">Add Coach</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/coaches" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="coachSpecialty" class="form-label">Specialty</label>
                            <select class="form-select" id="coachSpecialty" name="specialty" required>
                                <option value="Weight Training">Weight Training</option>
                                <option value="Cardio & Endurance">Cardio & Endurance</option>
                                <option value="Yoga & Flexibility">Yoga & Flexibility</option>
                                <option value="Strength & Conditioning">Strength & Conditioning</option>
                                <option value="Personal Training">Personal Training</option>
                                <option value="Diet & Nutrition">Diet & Nutrition</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Coach</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Coach Modal -->
    <div class="modal fade" id="editCoachModal" tabindex="-1" aria-labelledby="editCoachModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCoachModalLabel">Edit Coach</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCoachForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="coachId" name="id">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="coachName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="coachEmail" name="email" required>
                        </div>
                        <select class="form-select" id="editCoachSpecialty" name="specialty" required>
                            <option value="Weight Training">Weight Training</option>
                            <option value="Cardio & Endurance">Cardio & Endurance</option>
                            <option value="Yoga & Flexibility">Yoga & Flexibility</option>
                            <option value="Strength & Conditioning">Strength & Conditioning</option>
                            <option value="Personal Training">Personal Training</option>
                            <option value="Diet & Nutrition">Diet & Nutrition</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
