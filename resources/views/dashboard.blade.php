<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Tracker Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="py-6">
     
        <div class="container mx-auto">
            <h1 class="text-xl font-bold mb-4">User Route Tracker Dashboard</h1>
            
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border p-2">User ID</th>
                        <th class="border p-2">Visited Routes (in order)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $userId => $userLogs)
                        <tr>
                            <td class="border p-2">{{ $userId ?? 'Guest' }}</td>
                            <td class="border p-2">
                                {{ $userLogs->pluck('route')->join(' → ') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     
    </div>
</body>
</html>

