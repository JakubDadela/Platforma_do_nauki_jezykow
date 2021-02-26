<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Quiz made by ' . $quiz->user->name . ' in ' . ucfirst($quiz->language->language)  .' language.' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <form method="post" action="{{route("quizzes.solutions.store", $quiz)}}">
            @csrf
            @foreach($questions as $question)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="items-center mt-4 px-4 pb-5">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="text-center font-semibold bg-white overflow-hidden sm:rounded-lg">
                                    {{$loop->iteration}}.
                                    {{$question->names($question->type)}}
                                </div>
                                <div class="text-center font-medium bg-white overflow-hidden sm:rounded-lg">
                                    {{$quiz->question[$loop->index]->in_english}}
                                </div>
                            </div>
                            <br/>
                            @switch($question->type)
                                @case(1)
                                    <div class="mt-4">
                                        <x-label for="{{$question->id}}" :value="'Translate word to English'" />
                                        <x-input id="{{$question->id}}" class="block mt-1 w-full" type="text" name="{{$question->id}}" :value="old($question->id)" />
                                    </div>
                                @break;
                                @case(2)
                                    <div class="mt-4">
                                        <x-label for="{{$question->id}}" :value="'Translate sentence to English'" />
                                        <x-input id="{{$question->id}}" class="block mt-1 w-full" type="text" name="{{$question->id}}" :value="old($question->id)" />
                                    </div>
                                @break;
                                @case(3)
                                    <div class="flex items-center mt-4 px-4 pb-5">
                                        @for($i =0; $i<4; $i++)
                                            <div class="flex space-x-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                                    <a>{{$question->option[$i]->data}}</a>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="flex items-center ">
                                        @for($i ='A'; $i<='D'; $i++)
                                            <div class="flex space-x-4 max-w-7xl mx-auto">
                                                <label for="{{$i}}" class="container">{{$i}}
                                                    <input type="radio" checked="checked" name="{{$question->id}}"
                                                           id="{{$i}}" value="{{$i}}">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endfor
                                    </div>
                                @break;
                                @case(4)
                                    <div class="flex items-center mt-4 px-4 pb-5">
                                        @for($i=0; $i<4; $i++)
                                            <div class="flex space-x-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                                    <img src= {{URL::asset(($question->option[$i]->data))}}
                                                        alt="{{$question->option[1]->id}}" style="height:100px">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="flex items-center ">
                                        @for($i ='A'; $i<='D'; $i++)
                                            <div class="flex space-x-4 max-w-7xl mx-auto">
                                                <label for="{{$i}}" class="container">{{$i}}
                                                    <input type="radio" checked="checked" name="{{$question->id}}"
                                                           id="{{$i}}" value="{{$i}}">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endfor
                                    </div>
                                @break;
                                @case(5)
                                   @break;
                            @endswitch

                        </div>
                    </div>
                </div>
                <br/>
            @endforeach
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="items-center mt-4 px-4 pb-5">
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Sumbit answers to the quiz') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
