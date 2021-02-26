<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question Editor') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('quizzes.questions.update', ['quiz'=>$quiz->id, 'question'=>$question->id], $quiz, $question )}}">
                        @csrf
                        @method('patch')
                        <div>
                            <x-label for="in_english" :value="'Task content in ' . ucfirst($quiz->get_language($quiz->language_id))" />
                            <x-input id="in_english" class="block mt-1 w-full" type="text" name="in_english"
                                     :value="$question->in_english" autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="answerA" :value="'answer A'" />
                            <x-input id="answerA" class="block mt-1 w-full" type="text" name="answerA" :value="$options[0]" />
                        </div>
                        <div class="mt-4">
                            <x-label for="answerB" :value="'answer B'" />
                            <x-input id="answerB" class="block mt-1 w-full" type="text" name="answerB" :value="$options[1]" />
                        </div>
                        <div class="mt-4">
                            <x-label for="answerC" :value="'answer C'" />
                            <x-input id="answerC" class="block mt-1 w-full" type="text" name="answerC" :value="$options[2]" />
                        </div>
                        <div class="mt-4">
                            <x-label for="answerD" :value="'answer D'" />
                            <x-input id="answerD" class="block mt-1 w-full" type="text" name="answerD" :value="$options[3]" />
                        </div>

                        <div class="mt-4">
                            <x-label for="answer" :value="'Correct answer'" />
                            @if($question->answer == "a")
                                <select class="form-control rounded-md" name="answer" id="answer">
                                    <option value = 'a' selected>{{ __('Answer A') }}</option>
                                    <option value = 'b'>{{ __('Answer B') }}</option>
                                    <option value = 'c'>{{ __('Answer C') }}</option>
                                    <option value = 'd'>{{ __('Answer D') }}</option>
                                </select>
                            @elseif($question->answer == "b")
                                <select class="form-control rounded-md" name="answer" id="answer">
                                    <option value = 'a'>{{ __('Answer A') }}</option>
                                    <option value = 'b' selected>{{ __('Answer B') }}</option>
                                    <option value = 'c'>{{ __('Answer C') }}</option>
                                    <option value = 'd'>{{ __('Answer D') }}</option>
                                </select>
                            @elseif($question->answer == "c")
                                <select class="form-control rounded-md" name="answer" id="answer">
                                    <option value = 'a'>{{ __('Answer A') }}</option>
                                    <option value = 'b'>{{ __('Answer B') }}</option>
                                    <option value = 'c' selected>{{ __('Answer C') }}</option>
                                    <option value = 'd'>{{ __('Answer D') }}</option>
                                </select>
                            @elseif($question->answer == "d")
                                <select class="form-control rounded-md" name="answer" id="answer">
                                    <option value = 'a'>{{ __('Answer A') }}</option>
                                    <option value = 'b'>{{ __('Answer B') }}</option>
                                    <option value = 'c'>{{ __('Answer C') }}</option>
                                    <option value = 'd' selected>{{ __('Answer D') }}</option>
                                </select>
                            @else
                                <select class="form-control rounded-md" name="answer" id="answer">
                                    <option value = 'a'>{{ __('Answer A') }}</option>
                                    <option value = 'b'>{{ __('Answer B') }}</option>
                                    <option value = 'c'>{{ __('Answer C') }}</option>
                                    <option value = 'd'>{{ __('Answer D') }}</option>
                                </select>
                            @endif
                        </div>

                        <x-input id="type" class="block mt-1 w-full" type="hidden" name="type" :value=3 />

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save changes...') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
