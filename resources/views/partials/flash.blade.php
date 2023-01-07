<div x-data x-cloak>
    <div class="absolute bottom-0 right-0 left-0 flex justify-between items-center bg-red-800 text-white py-1 px-3"
        x-show="$store.app.serverError">
        <span class="text-center" x-text="$store.app.serverErrorMessage"></span>
        <button class="w-5 h-5 text-xl leading-none" @click="$store.app.serverError = false">
            &#10006;
        </button>
    </div>
</div>
