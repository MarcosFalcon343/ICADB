<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleado</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <form method="POST" action="{{ route('register-employee.create') }}">
        <div class="container mt-5 mb-5">
            <div class="container d-flex justify-content-between align-items-center mb-4">
                <h2>Register a New Employee</h2>
                <div class="d-flex align-items-center">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Back to Employees Catalog
                    </a>
                    <button type="submit" class="btn btn-success">Register Employee</button>
                </div>
            </div>

            <hr class="divide-gray-300">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf

            <h2>Login Information</h2>

            <div class="form-group mb-3">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <hr class="divide-gray-300">

            <h2>Employee Information</h2>

            <div class="d-flex justify-content-between mb-3">
                <div class="form-group">
                    <label for="empNo">EmpNo *</label>
                    <input type="text" id="EmpNo" name="EmpNo" class="form-control" placeholder="Enter Employee No"
                        required>
                    <small class="form-text text-muted">e.g., 'E100' (max 8 characters).</small>
                </div>
                <div class="form-group">
                    <label for="role">Rol</label>
                    <select class="form-control" id="role" name="role">
                        <option value="employee">Empleado</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="empName">Employee Name *</label>
                <input type="text" id="EmpName" name="EmpName" class="form-control" placeholder="Enter Employee Name"
                    required>
                <small class="form-text text-muted">e.g., 'JOHN DOE' (max 50 characters).</small>
            </div>

            <div class="form-group mb-3">
                <label for="department">Department *</label>
                <input type="text" id="Department" name="Department" class="form-control" placeholder="Enter Department"
                    required>
                <small class="form-text text-muted">e.g., 'SALES' (max 25 characters).</small>
            </div>

            <div class="form-group mb-3">
                <label for="email">Email *</label>
                <input type="email" id="Email" name="Email" class="form-control" placeholder="Enter Email" required>
                <small class="form-text text-muted">e.g., 'email@example.com' (max 30 characters).</small>
            </div>

            <div class="form-group mb-3">
                <label for="phone">Phone *</label>
                <input type="tel" id="Phone" name="Phone" class="form-control" placeholder="Enter Phone" required>
                <small class="form-text text-muted">e.g., '9999999999' (max 11 characters).</small>
            </div>

            <div class="form-group mb-3">
                <label for="mgrNo">MgrNo (Optional)</label>
                <input type="text" id="MgrNo" name="MgrNo" class="form-control" placeholder="Enter Manager No"
                    maxlength="8">
                <small class="form-text text-muted">e.g., 'E101' (max 8 characters).</small>
            </div>

            <button type="submit" class="btn btn-success mt-4">Register Employee</button>
        </div>
    </form>
</body>

</html>