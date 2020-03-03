@extends('layouts.master')

@section('title')
    Transaction   {{ $payload->addr or $raw->hash }}
@stop

@section('content')
    <div class="w-full max-w-xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 block">
        <div>
            <h5 class="inline-flex">Addr:</h5>
            <p class="inline-flex">
                {{ $payload->addr or  $raw->hash }}
            </p>
        </div>
        <div>
            <h5 class="inline-flex">Value:</h5>
            <p class="inline-flex">
                {{ $payload->value or 'no addr' }}
            </p>
        </div>
    </div>
    <h3 class="w-full mx-auto text-center mb-4">New block of this transaction</h3>
    @foreach($newblock as $block)
        <div class="w-full max-w-xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 block">
            <div>
                <h5 class="inline-flex">Addr:</h5>
                <p class="inline-flex">
                    {{ $block->addr or 'no addr' }}
                </p>
            </div>
            <div>
                <h5 class="inline-flex">Value:</h5>
                <p class="inline-flex">
                    {{ $block->value or 'no addr' }}
                </p>
            </div>
        </div>
    @endforeach
    <h3 class="w-full mx-auto text-center mb-4">Raw output</h3>
    <div class=" w-full block mx-auto bg-gray-800 text-gray-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="block overflow-x-hidden">
            <code class="block w-1">
                <pre>{{ var_dump($raw) }}
                </pre>
            </code>
        </div>
    </div>
@stop