@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-80 h-[80vh]">
        <h1 class="mb-3 text-3xl font-bold text-center">Simple calculator</h1>
        <div class="flex flex-col mb-5 bg-blue-300 rounded-lg" x-data="calculator"
            @keyup.escape.window="$refs.expression.value = ''">
            <form class="flex flex-col gap-2 px-6 text-black py-7" action="{{ route('calculate') }}" method="POST"
                x-on:submit.prevent="calculate(event)">
                <div>
                    <input
                        class="w-full px-2 py-1 text-right border border-solid rounded-lg bg-inherit placeholder:text-black/50 focus-visible:outline-white focus-visible:outline focus-visible:outline-1" autofocus
                        type="text" name="expression" placeholder="(25+32)*12/3" autocomplete="off" x-ref="expression"
                        x-bind:class="$store.app.validationErrors.expression ? 'border-red-500' : 'border-white'"
                        x-on:get-history.window.camel="setInput"
                    >
                    <div class="min-h-[20px] text-sm text-red-500" x-text="$store.app.validationErrors.expression"></div>
                </div>
                <input 
                    class="px-2 py-1 transition-colors bg-blue-500 rounded-lg cursor-pointer hover:bg-blue-600"
                    type="submit" value="Calculate">
            </form>
        </div>
        <ul class="px-6 py-7 border border-black rounded-lg max-h-[45vh] overflow-y-auto" x-on:calculated.window="calculations.unshift($event.detail)" x-on:click="getValue"
        x-data="{
            calculations: [],
            getValue(event){
                if(event.target.nodeName === 'SPAN') {
                    $dispatch('getHistory', event.target.innerText)
                }
            }
        }">
            <template x-for="calculation in calculations">
                <li class="flex justify-between gap-1.5 mb-2 last:mb-0">
                    <span class="max-w-[70%] break-words cursor-pointer" x-text="calculation.expression"></span>
                    <span class="max-w-[30%] flex justify-end items-center break-words font-bold cursor-pointer" x-text="calculation.result"></span>
                </li>
            </template>
            {{-- <button @click="console.log(calculations)">test</button> --}}
        </ul>
    </div>
@endsection
