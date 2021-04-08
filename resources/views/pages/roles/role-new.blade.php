<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Role Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('role') }}">Role</a></div>
            <div class="breadcrumb-item"><a href="">Buat Role Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:roles action="createRole" />
    </div>
</x-app-layout>
