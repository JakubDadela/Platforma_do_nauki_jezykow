<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sentence translation question creator') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('quizzes.questions.store', $quiz )}}">
                        @csrf
                        <div>
                            <x-label for="in_english" :value="'Sentence in ' . ucfirst($quiz->get_language($quiz->language_id))" />
                            <x-input id="in_english" class="block mt-1 w-full" type="text" name="in_english"
                                     :value="old('in_english')" autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="answer" :value="__('Answer in English')" />
                            <x-input id="answer" class="block mt-1 w-full" type="text" name="answer" :value="old('answer')" />
                        </div>

                        <x-input id="type" class="block mt-1 w-full" type="hidden" name="type" :value=2 />

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Add new question') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
