<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz nr '. $quiz->id .' results.') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Question number
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Correct Answer
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Your Answer
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Points
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($questions as $question)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$loop->iteration}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$question->answer}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$solutions[$loop->index]->answer}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if(ucfirst($question->answer)  == ucfirst($solutions[$loop->index]->answer))
                                    @php $total++; @endphp
                                    {{1}}
                                @else
                                    {{0}}
                                @endif
                            </td>
                            <td>
                            <form method="post" action="{{ route('quizzes.solutions.update', [$quiz, $solutions[$loop->index]])}}">
                                @method('patch')
                                @csrf
                                <x-button-delete aclass="ml-4">
                                    {{ __('Report') }}
                                </x-button-delete>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <br/>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="items-center mt-4 px-4 pb-5">
                    <div class="flex items-center justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="text-center font-semibold bg-white overflow-hidden sm:rounded-lg">
                            Total amount of points = {{$total}} / {{count($questions)}}
                        </div>
                        <a href="{{ url('/quizzes') }}">
                            <x-button class="ml-4">
                                {{ __('Procede') }}
                            </x-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</x-app-layout>
