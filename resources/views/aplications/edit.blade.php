<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Application') }}
        </h2>
    </x-slot>
    @forelse ( as )
        
    @empty
        
    @endforelse
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="space-y-6" action="{{ route('aplications.update', $aplication->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="subject" class="block leading-6">Subject</label>
                            <div class="mt-2">
                                <input id="subject" name="subject" type="text" autocomplete required
                                    value="{{ $aplication->subject }}"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('subject')
                                    <span class="text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block leading-6">Message</label>
                            <div class="mt-2">
                                <textarea name="message" id="message" cols="30" rows="10" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $aplication->message }}</textarea>
                                @error('message')
                                    <span class="text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="file" class="block leading-6">File</label>
                            <div class="mt-2">
                                <input id="file" name="file" type="file" accept="image/png, image/jpeg"
                                    value="{{ $aplication->file_url }}"
                                    class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('file')
                                    <span class="text-red-600" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 mr-2 px-11 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send</button>
                            <input type="reset"
                                class="rounded-md bg-red-600 px-11 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                                value="Clear">
                            <a href="{{ route('my-applications') }}"
                                class="inline-block rounded-md bg-red-600 px-11 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
