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

            <form method="GET" action="{{ route('route-tracker.dashboard') }}" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Search by user ID or route..." 
                    class="border p-2 rounded">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
            </form>

            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border p-2">User ID</th>
                        <th class="border p-2">IP</th>
                        <th class="border p-2">Previous Route</th>
                        <th class="border p-2">Visited Routes (in order)</th>
                        <th class="border p-2">visited At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs  as $userLogs)
                        <tr>
                            <td class="border p-2">{{$userLogs->user_id ?? 'Guest' }}</td>
                            <td class="border p-2">{{$userLogs->ip_address ?? 'Guest' }}</td>
                            <td class="border p-2">{{$userLogs->previous_route ?? 'root' }}</td>
                            <td class="border p-2">
                                {{ $userLogs->route }}
                            </td>
                            <td class="border p-2">
                                {{$userLogs->visited_at}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     
    </div>
</body>
</html>

