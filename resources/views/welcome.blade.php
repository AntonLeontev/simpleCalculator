@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="mb-3 text-3xl font-bold text-center cursor-pointer">Simple calculator</h1>
    <div class="flex flex-col max-w-xs mx-auto bg-blue-300 rounded-lg" x-data="calculator"
        @keyup.alt.escape="$refs.expression.value = ''">
        <form class="flex flex-col gap-2 px-6 text-black py-7" action="{{ route('calculate') }}" method="POST"
            x-on:submit.prevent="calculate(event)">
            <div>
                <input
                    class="w-full px-2 py-1 text-right border border-solid rounded-lg bg-inherit placeholder:text-black/50 focus-visible:outline-white focus-visible:outline focus-visible:outline-1"
                    type="text" name="expression" placeholder="25+32*12/3" autocomplete="off" x-ref="expression"
                    x-bind:class="$store.app.validationErrors.expression ? 'border-red-500' : 'border-white'">
                <div class="h-5 text-sm text-red-500" x-text="$store.app.validationErrors.expression"></div>
            </div>
            <input class="px-2 py-1 transition-colors bg-blue-500 rounded-lg cursor-pointer hover:bg-blue-600"
                type="submit" value="Calculate">
        </form>
        {{-- <button @click="console.log(result)">test</button> --}}
        <div></div>
    </div>
@endsection
