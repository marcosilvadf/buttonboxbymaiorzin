<form 
    action="{{ $action }}"
    method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    id="{{ $id }}"
    @isset($enctype) enctype="{{ $enctype }}" @endisset
    {{ $attributes->merge(['class' => 'card p-4 shadow-sm']) }}
>

    @if($method !== 'GET')
        @csrf
    @endif

    @if(!in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    <div class="d-flex flex-column gap-3">
        {{ $slot }}
    </div>

</form>