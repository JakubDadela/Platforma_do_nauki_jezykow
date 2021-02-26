<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discussion') }}
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
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Text
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Solve</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-wrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$comment->title}}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{json_decode(\App\Models\User::select('email')->where('id',$comment->user_id)->first(),true)['email']}}
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-wrap">
                                            <div class="text-sm text-gray-500">{{$comment->text}}</div>
                                        </td>
                                    </tr>
                                        @foreach($subcomments as $subcomment)
                                            <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{$subcomment->title}}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{json_decode(\App\Models\User::select('email')->where('id',$subcomment->user_id)->first(),true)['email']}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-wrap">
                                                <div class="text-sm text-gray-500">{{$subcomment->text}}</div>
                                            </td>
                                                @if($subcomment->user_id==\Illuminate\Support\Facades\Auth::id())
                                                    <td class="px-6 py-4 whitespace-wrap">
                                                        <form method="get" action="{{ route('quizzes.comments.subcomments.edit',  ['quiz'=>$quiz,'comment'=>$comment,'subcomment'=>$subcomment]) }}">
                                                            <x-button class="ml-4">
                                                                {{ __('Edit') }}
                                                            </x-button>
                                                        </form>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-wrap">
                                                        <form method="post" action="{{ route('quizzes.comments.subcomments.destroy',  ['quiz'=>$quiz,'comment'=>$comment,'subcomment'=>$subcomment]) }}">
                                                            @csrf
                                                            @method("DELETE")
                                                            <x-button-delete class="ml-4">
                                                                {{ __('Delete') }}
                                                            </x-button-delete>
                                                        </form>
                                                    </td>
                                                @endif
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="items-center mt-4 px-4 pb-5">
            <div class="flex items-center justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form method="get" action="{{ route('quizzes.comments.subcomments.create',['quiz'=>$quiz,'comment'=>$comment]) }}">

                    <x-button class="ml-4">

                        {{ __('Add answer') }}

                    </x-button>

                </form>
            </div>
        </div>
        <div class="items-center mt-4 px-4 pb-5">
            <div class="flex items-center justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form method="get" action="{{ route('quizzes.comments.index',$quiz )}}">
                    <x-button class="ml-4">
                        {{ __('Go back') }}
                    </x-button>
                </form>
            </div>
        </div>
{{--        <div class="items-center mt-4 px-4 pb-5">--}}
{{--            <div class="flex items-center justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                <form method="post" action="{{ route('quizzes.comments.index',\App\Models\Quiz::where('id',$comment->quiz_id)) }}">--}}

{{--                    <x-button class="ml-4">--}}

{{--                        {{ __('Go back') }}--}}

{{--                    </x-button>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <br/>
    </div>
</x-app-layout>
