@extends('layouts.app')

@section('content')
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
@endsection
