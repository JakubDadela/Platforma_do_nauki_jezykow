<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Multiple image choice question creator') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('quizzes.questions.update', ['quiz'=>$quiz->id, 'question'=>$question->id], $quiz, $question )}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div>
                            <x-label for="in_english" :value="'Task content in ' . ucfirst($quiz->get_language($quiz->language_id))" />
                            <x-input id="in_english" class="block mt-1 w-full" type="text" name="in_english"
                                     :value="$question->in_english" autofocus />
                        </div>
                            <div class="container items-center">
                                <img class="items-center" src= {{URL::asset(($options[0]))}}
                                    alt="{{$question->option[0]->id}}" style="height:100px">
                                <x-upload id="Answer A">
                                    <x-slot name="label"> Upload file to A answer</x-slot>
                                </x-upload>
                                <img src= {{URL::asset(($options[1]))}}
                                    alt="{{$question->option[1]->id}}" style="height:100px">
                                <x-upload id="Answer B">
                                    <x-slot name="label"> Upload file to B answer</x-slot>
                                </x-upload>
                                <img src= {{URL::asset(($options[2]))}}
                                    alt="{{$question->option[2]->id}}" style="height:100px">
                                <x-upload id="Answer C">
                                    <x-slot name="label"> Upload file to C answer</x-slot>
                                </x-upload>
                                <img src= {{URL::asset(($options[3]))}}
                                    alt="{{$question->option[3]->id}}" style="height:100px">
                                <x-upload id="Answer D">
                                    <x-slot name="label"> Upload file to D answer</x-slot>
                                </x-upload>
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
                        <input type="hidden" name="create_new" value="create_new"/>
                        <x-input id="type" class="block mt-1 w-full" type="hidden" name="type" :value=4 />

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save changes') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
