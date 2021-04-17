<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Menu') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data menu baru') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-5 alert alert-info">
                Info : use # if you don't want to fill out the form
              </div><br/>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="parent_id" value="{{ __('Parent') }}" />
                {{-- <x-jet-input id="parent_id" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="menu.parent_id" /> --}}
                <select wire:model="menu.parent_id" class="mt-1 block w-full form-control shadow-none" id="menu.parent_id">
                    <option selected value="">Select a Parent</option>
                    <option value="0">No Parent</option>
                    @foreach($parentMenu as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="menu.parent_id" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="menu.title" value="{{ __('Title') }}" />
                <x-jet-input id="menu.title" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="menu.title" />
                <x-jet-input-error for="menu.title" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="menu.text" value="{{ __('Text') }}" />
                <x-jet-input id="menu.text" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="menu.text" />
                <x-jet-input-error for="menu.text" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="menu.icon" value="{{ __('Icon') }}" />
                <x-jet-input id="menu.icon" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="menu.icon" />
                <small>Ex: fas fa-users</small>
                <x-jet-input-error for="menu.icon" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="menu.href" value="{{ __('Href') }}" />
                <x-jet-input id="menu.href" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="menu.href" />
                <small>Ex: user (this href is refer to route name)</small>
                <x-jet-input-error for="menu.href" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="menu.is_multi" value="{{ __('Have Sub Menu ?') }}" />
                {{-- <x-jet-input id="is_multi" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="menu.is_multi" /> --}}
                <select wire:model="menu.is_multi" class="mt-1 block w-full form-control shadow-none" id="menu.is_multi">
                    <option selected value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <x-jet-input-error for="menu.is_multi" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="menu.role" value="{{ __('Role Access') }}" />
                <x-jet-input id="menu.role" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="menu.role" />
                <small>Ex: Admin,User (use comma to add multiple role)</small>
                <x-jet-input-error for="menu.role" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
