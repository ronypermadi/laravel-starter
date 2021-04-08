<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Permission Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('permission') }}">Permission</a></div>
            <div class="breadcrumb-item"><a href="">Buat Permission Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:permissions action="createPermission" />
    </div>
</x-app-layout>
