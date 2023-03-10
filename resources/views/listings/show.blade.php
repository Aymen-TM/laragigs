@extends('layout')

@include('partials._search')
@section('content')
<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src={{ asset('images/no-image.png') }}
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$listings->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listings->company}}</div>
                        <ul class="flex">
                                <x-listing-tag :tags="$listings->tags" />    
                        </ul>
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listings->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{$listings->description}}
                                </p>
                                <p>
                                    {{$listings->description}}
                                </p>

                                <a
                                    href={{$listings->email}}
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href={{$listings->website}}
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                                <a
                                href="{{$listings->id}}/edit"
                                target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-pencil"></i> Edit Post</a
                            >
                            <form method="POST" action="{{$listings->id}}/delete">
                                @csrf
                                @method('DELETE')
                                <button class=" bg-gray-800 text-white w-full py-2 rounded-xl hover:opacity-80 " type="submit" ><i class="fa-solid fa-trash mr-1"></i>DELETE</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection