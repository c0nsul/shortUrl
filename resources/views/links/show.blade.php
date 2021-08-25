@extends('layouts.main')

@section('content')
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">URL generator</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Danger
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>{{$error}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if (session()->has('success'))
                        <div role="alert">
                            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                                Success!
                            </div>
                            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                                <p>Your url was saved successful! Hashed url: <a href="{{ session()->get('success') }}">{{ session()->get('success') }}</a></p>
                            </div>
                        </div>
                @endif

                <form action="{{route('links.send')}}" method="POST">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company-website" class="block text-sm font-medium text-gray-700">
                                        URL
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">

                                        <input type="text" name="url" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="https://www.example.com" required>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">
                                    URL description
                                </label>
                                <div class="mt-1">
                                    <textarea id="about" name="desc" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="description..."></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
