<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Certificate Verification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="/dashboard" class="space-y-2">
                        <x-input id="query" name="query" type="search" value="{{ request()->get('query') }}"
                            placeholder="Type a Certificate number" class="block w-full" />
                        <x-button>Search</x-button>
                    </form>
                </div>
                @if ($students)
                    <div class="space-y-4">
                        @if ($students->count())
                            @foreach ($students as $student)
                                {{-- {{ dd($student); }} --}}
                                <div>
                                    <h1><u>CONFIRMATION OF CERTIFICATE - {{ $student->lname }}
                                            {{ $student->fname }}</u></h1>

                                    <p>This confirms that {{ $student->fname }} {{ $student->lname }}
                                        ({{ $student->regno }})
                                        is a past student of the University of Cape Coast. He
                                        was admitted in {{ substr($student->doa, -4) }} to pursue a
                                        {{ $student->program->program_type->comment }} in
                                        {{ $student->program->long_name }}.
                                    </p>
                                    <span>{{ $student->lname }} wrote and passed the final examinations in
                                        {{ substr($student->doc, -4) }} and was accordingly admitted to the degree of
                                        {{ $student->program->program_type->comment }}
                                        @if ($student->program->program_type->comment === 'BACHELOR')
                                            <span>with
                                                @if ($student->cgpa >= 3.6)
                                                    <span>First Class Honours</span>
                                                @elseif ($student->cgpa >= 3.0)
                                                    <span>Second Upper, Upper Divison</span>
                                                @elseif ($student->cgpa >= 2.5)
                                                    <span>Second Lower, Lower Division</span>
                                                @elseif ($student->cgpa >= 2.0)
                                                    <span>Third Class</span>
                                                @else
                                                    <span> a Pass</span>
                                                @endif
                                            </span>
                                        @else
                                            <span>----INSERT date of completion here ----</span>
                                        @endif
                                    </span>



                                </div>
                            @endforeach
                        @else
                            <p>No student found</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
