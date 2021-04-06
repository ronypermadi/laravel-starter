<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit User') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">User</a></div>
            <div class="breadcrumb-item"><a href="">Edit User</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:users action="updateUser" :userId="request()->userId" />
    </div>
</x-app-layout>
