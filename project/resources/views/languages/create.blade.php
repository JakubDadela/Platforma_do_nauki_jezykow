<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating a language') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <p>{{$errors}}</p>
                    @endif
                    <form method="POST" action="{{route('languages.store')}}">
                        @csrf
                        {{--                            <input type="text" name="language">}}--}}
                        <div>
                            <x-label for="language" :value="__('Language')" />
                            <x-input id="language" class="block mt-1 w-full" type="text" name="language" :value="old('language')" />
                        </div>
                        <div class="flex items-center justify-end mt-4 px-4 pb-5">
                            <x-button class="ml-3">
                                {{ __('Add new language') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

