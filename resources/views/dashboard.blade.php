<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Certificate Verification') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="/dashboard" class="space-y-2">

                        <x-input id="query" name="query" type="search" value="{{ request()->get('query') }}"
                            placeholder="Type a Certificate number or Index Number" class="block w-full" />
                        <x-button>Search</x-button>
                    </form>
                </div>
                <!-- component -->
                @if ($student)
                    <div
                        class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16">
                        @if ($student->count())
                            {{-- @foreach ($student as $student) --}}
                            <div class="px-6">
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full flex justify-center">
                                        <div class="relative">
                                            <img src="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind/blob/main/build/assets/img/team-2.jpg?raw=true"
                                                class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
                                        </div>
                                    </div>
                                    <div class="w-full text-center mt-20">
                                        <div class="flex justify-center lg:pt-4 pt-8 pb-0">

                                            <div class="p-3 text-center">
                                                <span class="text-sm text-slate-400">{{ $student->regno }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">
                                        {{ $student->fname }} {{ $student->lname }}</h3>
                                    {{-- <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                                            <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>Paris,
                                            France
                                        </div> --}}
                                </div>
                                <div class="mt-6 py-6 border-t border-slate-200 text-center">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full px-4">
                                            <p class="font-light leading-relaxed text-slate-600 mb-4">This confirms
                                                that {{ $student->fname }} {{ $student->lname }}

                                                ({{ $student->regno }})
                                                is a past student of the University of Cape Coast. He
                                                was admitted in {{ substr($student->doa, -4) }} to pursue a
                                                {{ $student->program->program_type->comment }} in
                                                {{ $student->program->long_name }}.

                                                <span>{{ $student->lname }} wrote and passed the final
                                                    examinations in
                                                    {{ substr($student->doc, -4) }} and was accordingly admitted
                                                    to the degree of
                                                    {{ $student->program->program_type->comment }}
                                                    @if ($student->program->program_type->comment === 'BACHELOR')
                                                        <span>with
                                                            @if ($student->cgpa >= 3.6)
                                                                <span>First Class Honours</span>
                                                            @elseif ($student->cgpa >= 3.0)
                                                                <span>Second Class, Upper Divison</span>
                                                            @elseif ($student->cgpa >= 2.5)
                                                                <span>Second Class, Lower Division</span>
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
                                            </p>
                                            <a href="/download/{{ $student->id }}">
                                                <x-button>DOWNLOAD
                                                    PDF</x-button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                        @else
                            <p>No student was found</p>
                        @endif
                    </div>
                @endif



            </div>
        </div>
    </div>



</x-app-layout>
