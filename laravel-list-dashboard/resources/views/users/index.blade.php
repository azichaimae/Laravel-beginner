<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ __("Users's list") }}</h1>
                    <div class="row">
                        @if(count($user)>0)
                            @foreach ($user as $user )
                                <div class="col-md-2">
                                    <a href="{{ route("user",$user)}}"><h2>{{$user->name}}</h2></a>
                                    <p>Email : {{$user->email}}</p>
                                    <p>Username : {{$user->username}}</p>
                                    <button class="delete"><a href="{{'delete/'.$user->id}}">Delete</a></button>
                                    <button class="edit"><a href="{{'editUser/'.$user->id}}">Edit</a></button>
                                </div>
                            @endforeach
                        @else
                            <p>Aucun user disponible dans la base de données</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
