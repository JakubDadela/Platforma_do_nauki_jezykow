<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your answer') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('quizzes.comments.subcomments.update',['quiz'=>$quiz,'comment'=>$comment,'subcomment'=>$subcomment])}}">
                        @csrf
                        @method("PUT")
                        <div>
                            <x-label for="title" :value="__('title')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$subcomment->title" autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="text" :value="__('Text')" />
                            <x-input id="text" class="block mt-1 w-full" type="text" name="text" :value="$subcomment->text" />
                        </div>
                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Edit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
