@extends('layouts.master')

@section('title')
    index
@stop

@section('js')
    <script type="text/javascript">
        function appendToinput(text){
            document.getElementById('hash_tag').value += text;
        }
    </script>
@stop

@section('content')
    <div class="w-full max-w-lg mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post"
              action="{{ route('transactions.show') }}">
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Hash ID
                </label>
                <input name="hash"
                       class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                       id="hash_tag" type="password" placeholder="******************">
                @if(Session::has('message'))
                    <p class="text-red-500 text-xs italic">{{ Session::get('message') }}</p>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <button class=" w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                    Check your wallet
                </button>
            </div>
            <input type="hidden" name="_token" value="{{  csrf_token() }}">
        </form>
    </div>

    <div class=" text-left mx-auto container max-w-2xl">
        @foreach($model as $t)
            <a href="#" onClick="appendToinput('{{ $t->txid }}'); return false" >
                <div class="bg-white rounded shadow-outline p-2 my-4">
                    <span  class="block w-1/1"><b>txid:</b> {{ $t->txid }}</span>
                    <span class="block w-1/1"><b>search at:</b> {{ $t->created_at }}</span>
                </div>
            </a>
        @endforeach

        {{ $model->links('partials.pagination') }}

        <div class="text-center">
            <a href="#" onClick="appendToinput('b6f6991d03df0e2e04dafffcd6bc418aac66049e2cd74b80f14ac86db1e3f0da'); return false" class="mt-6 text-center">default: b6f6991d03df0e2e04dafffcd6bc418aac66049e2cd74b80f14ac86db1e3f0da</a>
        </div>
    </div>
@stop