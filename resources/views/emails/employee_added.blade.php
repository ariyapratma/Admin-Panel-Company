<!DOCTYPE html>
<html>

<head>
    <title>New Employee Added</title>
</head>

<body>
    <h1>New Employee Added</h1>
    <p>Hello Admin,</p>
    <p>A new employee has been added to your company.</p>

    <p><strong>First Name:</strong> {{ $employee->firstname }}</p>
    <p><strong>Last Name:</strong> {{ $employee->lastname }}</p>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Phone:</strong> {{ $employee->phone }}</p>

    <p>Best regards,</p>
    <p>Your Application Team</p>
</body>

</html>
