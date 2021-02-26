<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin tab') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Creator Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Language
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Solve</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        @foreach($quizzes as $quiz)
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{$quiz->user->name}}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{$quiz->user->email}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    @switch(ucfirst($quiz->language->language))
                                                        @case('German')
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png"
                                                             alt="">
                                                        @break;

                                                        @case('Spanish')
                                                        <img class="h-10 w-10 rounded-full" src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/1200px-Flag_of_Spain.svg.png"
                                                             alt="">
                                                        @break;

                                                        @case('Swedish')
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="https://upload.wikimedia.org/wikipedia/en/thumb/4/4c/Flag_of_Sweden.svg/1200px-Flag_of_Sweden.svg.png"
                                                             alt="">
                                                        @break;

                                                        @case('Chinese')
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="https://cdn.britannica.com/90/7490-004-BAD4AA72/Flag-China.jpg"
                                                             alt="">
                                                        @break;

                                                        @case('Portugese')
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/255px-Flag_of_Portugal.svg.png"
                                                             alt="">
                                                        @case('Polish')
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="https://cdn.britannica.com/52/3552-004-D849A1D3/Flag-Poland.jpg"
                                                             alt="">
                                                        @break;
                                                        @default
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/International_Flag_of_Planet_Earth.svg/1280px-International_Flag_of_Planet_Earth.svg.png"
                                                             alt="">
                                                        @break;
                                                    @endswitch
                                                </div>
                                                <div class="text-sm text-gray-500">{{ucfirst($quiz->language->language)}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form method="get" action="{{ route('quizzes.show',['quiz'=>$quiz->id]) }}">
                                                    <x-button class="ml-4" id="discusion.{{$quiz->id}}">
                                                        {{ __('Details') }}
                                                    </x-button>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form method="get" action="{{ route('quizzes.comments.index', $quiz) }}">
                                                    <x-button class="ml-4">
                                                        {{ __('Discuss') }}
                                                    </x-button>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form method="post" action="{{ route('quizzes.destroy', $quiz) }}">
                                                    @method('Delete')
                                                    @csrf
                                                    <x-button-delete class="ml-4">
                                                        {{ __('Delete') }}
                                                    </x-button-delete>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br/>
    </div>
</x-app-layout>
