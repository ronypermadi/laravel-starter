@props(['on', 'message', 'type'])

<div x-data="{ message: '{{ $message }}', 'type': '{{ $type }}' }"
    x-init="@this.on('{{ $on }}', () => { console.log('fired 2'); const notyf = new Notyf({ duration: 5000,dismissible: true, position: { x: 'right', 'y': 'top' } }); notyf[type](message); })">
</div>
