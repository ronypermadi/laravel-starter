<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Role') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('role') }}">Role</a></div>
            <div class="breadcrumb-item"><a href="">Edit Role</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:roles action="updateRole" :roleId="request()->roleId" />
    </div>
</x-app-layout>
