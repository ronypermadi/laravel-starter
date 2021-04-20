<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Message') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('message') }}">Message</a></div>
            <div class="breadcrumb-item"><a href="">Data Message</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:messages name="message" :model="$message" />
    </div>
</x-app-layout>
@include('livewire.list_user')
