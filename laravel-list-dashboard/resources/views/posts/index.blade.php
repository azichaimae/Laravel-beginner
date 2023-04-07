<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>{{ __("Post's list") }}</h1>
                        <div class="row">
                            @if(count($post)>0)

                                    @foreach ($post as $post )
                                        <div class="col-md-2">
                                            <a href="{{ route("posts.show",$post)}}">   <h2> {{$post->title}}   </h2> </a>
                                            <p>published at{{$post->created_at->format("d/m/Y H:i:s")}}</p>

                                            <button class="delete"><a href="{{'delete/'.$post->id}}" >Delete</a></button>
                                            <button class="edit"><a href="{{'edit/'.$post->id}}" >Edit</a></button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Aucun post disponible dans la base de données</p>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
