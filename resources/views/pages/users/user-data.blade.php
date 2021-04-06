<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data User') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">User</a></div>
            <div class="breadcrumb-item"><a href="">Data User</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="users" :model="$users" />
    </div>
</x-app-layout>
