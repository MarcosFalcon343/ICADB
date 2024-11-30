<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <form method="POST" action="{{ route('register-customer.create')}}">
        <div class="container mt-5 mb-5">
            <div class="container d-flex justify-content-between align-items-center mb-4">
                <h2>Register a New Customer</h2>
                <div class="d-flex align-items-center">
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Back to Customers Catalog
                    </a>
                    <button type="submit" class="btn btn-success">Register Customer</button>
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

            <H2>Login Information</H2>

            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <hr class="divide-gray-300">

            <H2>Customer Information</H2>

            <div class="d-flex justify-content-between">
                <div class="form-group mr-3">
                    <label for="custNo">CustNo *</label>
                    <input type="text" id="CustNo" name="CustNo" class="form-control" placeholder="Enter Customer No"
                        required>
                    <small class="form-text text-muted">e.g., 'C100' (max 8 characters).</small>
                </div>
                <div class="form-group">
                    <label for="internal">Internal</label>
                    <select class="form-control" id="Internal" name="Internal">
                        <option value="Y">YES</option>
                        <option value="N">NO</option>
                    </select>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="custName">Customer Name *</label>
                <input type="text" id="CustName" name="CustName" class="form-control" placeholder="Enter Customer Name"
                    required>
                <small class="form-text text-muted">e.g., 'FOOTBALL TEAM' (max 50 characters).</small>
            </div>

            <div class="d-flex">
                <div class="form-group mr-3 flex-grow-1">
                    <label for="contact">Contact *</label>
                    <input type="text" id="Contact" name="Contact" class="form-control"
                        placeholder="Enter Customer Contact" required>
                    <small class="form-text text-muted">e.g., 'MARY MANAGER' (max 50 characters).</small>
                </div>
                <div class="flex-grow-1"></div>
                <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="tel" id="Phone" name="Phone" class="form-control" placeholder="Enter Customer Phone"
                        required>
                    <small class="form-text text-muted">e.g., '9999999999' (max 11 characters).</small>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="address">Address *</label>
                <input type="text" id="Address" name="Address" class="form-control" placeholder="Enter Customer Address"
                    required>
                <small class="form-text text-muted">e.g., 'BOX 352200' (max 50 characters).</small>
            </div>

            <div class="d-flex mb-4">
                <div class="form-group mr-3 flex-grow-1">
                    <label for="city">City *</label>
                    <input type="text" id="City" name="City" class="form-control" placeholder="Enter Customer City"
                        required>
                    <small class="form-text text-muted">e.g., 'SEATTLE' (max 30 characters).</small>
                </div>
                <div class="form-group mx-sm-3">
                    <label for="state">State *</label>
                    <input type="text" id="State" name="State" class="form-control" placeholder="Enter Customer State"
                        required>
                    <small class="form-text text-muted">e.g., 'WA' (max 2 characters).</small>
                </div>

                <div class="form-group">
                    <label for="zipCode">Zip Code *</label>
                    <input type="text" id="ZipCode" name="ZipCode" class="form-control"
                        placeholder="Enter Customer Zip Code" required>
                    <small class="form-text text-muted">e.g., '98195' (max 10 characters).</small>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Register Customer</button>
    </form>
</body>

</html>