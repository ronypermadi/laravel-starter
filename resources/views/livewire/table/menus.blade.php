<div>
    <x-data-table :data="$data" :model="$menus">
        <x-slot name="head">
            <tr> 
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('parent_id')" role="button" href="#">
                    Parent ID
                    @include('components.sort-icon', ['field' => 'parent_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Title
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('text')" role="button" href="#">
                    Text
                    @include('components.sort-icon', ['field' => 'text'])
                </a></th>
                <th><a wire:click.prevent="sortBy('href')" role="button" href="#">
                    Href
                    @include('components.sort-icon', ['field' => 'href'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($menus as $menu)
                <tr x-data="window.__controller.dataTableController({{ $menu->id }})">
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->parent_id }}</td>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->text }}</td>
                    <td>{{ $menu->href }}</td>
                    <td>{{ $menu->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{route('menu.edit',['menuId' => $menu->id ])}}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
