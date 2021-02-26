<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz creator. Choose a language.') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-center mt-4 px-4 pb-5">
                    <form method="post" action="{{route('quizzes.store')}}">
                        @csrf
                        <label for="language">Language: </label>
                        {{--                            <input type="text" name="language">--}}
                        <select class="form-control rounded-md" name="language" id="cars">
                            @foreach($languages as $language)
                                <option>{{ ucfirst($language->language) }}</option>
                            @endforeach
                        </select>
                        <x-button class="ml-4">
                            {{ __('Select language') }}
                        </x-button>
                    </form>

                    <form method="get" action="{{ route('languages.create') }}">
                        <x-button class="ml-4">
                            {{ __('Add new language') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
