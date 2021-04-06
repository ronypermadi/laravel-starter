<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat User Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">User</a></div>
            <div class="breadcrumb-item"><a href="">Buat User Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:users action="createUser" />
    </div>
</x-app-layout>
