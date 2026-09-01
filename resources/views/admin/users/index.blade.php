@extends('admin.layouts.master')

@section('title', 'Admin Users — Admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-automotive-500">{{ $admins->count() }} admin user(s)</p>
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-safety hover:bg-safety-dark text-white text-sm font-medium rounded-lg transition-colors inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create Admin
        </a>
    </div>

    <div class="bg-white rounded-xl border border-automotive-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-automotive-50 text-automotive-500 text-xs uppercase tracking-wider">
                <tr>
                    <th class="text-left px-4 py-3 font-medium">Name</th>
                    <th class="text-left px-4 py-3 font-medium">Email</th>
                    <th class="text-left px-4 py-3 font-medium">Created</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-automotive-50">
                @foreach($admins as $admin)
                <tr class="hover:bg-automotive-50/50">
                    <td class="px-4 py-3 font-medium text-automotive-900">{{ $admin->name }}</td>
                    <td class="px-4 py-3 text-automotive-500">{{ $admin->email }}</td>
                    <td class="px-4 py-3 text-automotive-400 text-xs">{{ $admin->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
