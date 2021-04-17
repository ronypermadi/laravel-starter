<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Menu') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('menu') }}">Menu</a></div>
            <div class="breadcrumb-item"><a href="">Edit Menu</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:menus action="updateMenu" :menuId="request()->menuId" />
    </div>
</x-app-layout>
