<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3">
                    Message
                </th>
                <th scope="col" class="px-6 py-3">
                    File
                </th>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3" colspan="2">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($applications as $application)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $application->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $application->subject }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $application->message }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($application->file_url)
                            <a href="files/{{ auth()->user()->name }}/{{ $application->file_url }}"
                                download="files/{{ auth()->user()->name }}/{{ $application->file_url }}"
                                class="text-nowrap block rounded-md bg-lime-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Download
                                file</a>
                        @else
                            {{ 'No Files' }}
                        @endif
                    </td>
                    <td>
                        {{ $application->user->name }}
                    </td>
                    <td class="pr-3">
                        {{ $application->user->email }}
                    </td>
                    <td class="pr-3">
                        {{ $application->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('aplications.edit', $application->id) }}"
                            class="inline-block rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('aplications.destroy', $application->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="5" class="px-6 py-4">No Applications Found</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
