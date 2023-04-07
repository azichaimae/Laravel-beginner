<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <title>Edit Post</title>
                    <fieldset>
                        <legend>Edit Post :</legend>
                        <form method="POST" action="{{ url('update/'.$post->id)}}">
                            @csrf
                            @method('PUT')
                            <label for="title">{{__('title')}}</label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   value="{{$post->title}}"
                                   @error('title') is-invalid
                                   @enderror autocomplete="title"
                            autofocus>
                            @error('title')
                            <span  class="error"><strong>{{$message}}</strong></span>
                            @enderror
                            <br>
                            <label for="content">{{ __('content')}}</label>
                            <textarea name="content"
                                      id="content"
                                      cols="30"
                                      rows="10"
                                      value="{{$post->content}}"
                                      @error('content') is-invalid
                                      @enderror
                                      autocomplete="content">
                            </textarea>
                            @error('content')
                            <span class="error"><strong>{{__("invalidContent")}}</strong></span>
                            @enderror
                            <br>
                            <input type="submit" value="{{__('update')}}">
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
