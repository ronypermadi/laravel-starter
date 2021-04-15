<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Menu') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('menu') }}">Menu</a></div>
            <div class="breadcrumb-item"><a href="">Data Menu</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="menus" :model="$menu" />
    </div>
</x-app-layout>
