<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard Test</h1>
        <p>User: {{ $user->name ?? 'No user' }}</p>
        <p>Total Orders: {{ $totalOrders ?? 0 }}</p>
        <p>Total Spent: ${{ number_format($totalSpent ?? 0, 2) }}</p>
        <p>Enrolled Courses: {{ count($enrolledCourses ?? []) }}</p>
        
        <a href="{{ route('home') }}" class="btn btn-primary">Go Home</a>
    </div>
</body>
</html> 