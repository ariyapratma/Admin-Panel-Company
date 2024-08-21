<!DOCTYPE html>
<html>

<head>
    <title>Employee Added</title>
</head>

<body>
    <h1>Hello {{ $employee->name }},</h1>
    <p>We are pleased to inform you that you have been successfully added to our system.</p>
    <p>Here are your details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $employee->name }}</li>
        <li><strong>Email:</strong> {{ $employee->email }}</li>
        <li><strong>Position:</strong> {{ $employee->position }}</li>
    </ul>
    <p>Thank you for being a part of our team!</p>
</body>

</html>
