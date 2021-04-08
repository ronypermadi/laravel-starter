<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Permissions') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('permission') }}">Permission</a></div>
            <div class="breadcrumb-item"><a href="">Data Permission</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="permissions" :model="$permissions" />
    </div>
</x-app-layout>
