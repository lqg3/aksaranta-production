@extends('layouts.learn-layout')

@section('title', $course->course_name . ' - Aksaranta')

@section('content')

    <!-- Header Section -->
    <section class="mt-24 mb-12 md:w-[80%] w-[90%]">
        <!-- Breadcrumbs -->
        <ul class="text-black/50 dark:text-white/40 flex gap-2">
            <li class="hover:text-black/70 dark:hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                <a href="#" @click.prevent="navigateTo('/learn')">Learn</a>
            </li>
            <li class="text-black/50 dark:!text-white/40">></li>
            <li class="hover:text-black/70 dark:hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                {{ $course->course_name }}</li>
        </ul>

        <!-- Course Title -->
        <h1 class="text-black dark:text-white font-semibold text-title mt-4">{{ $course->course_name }}</h1>
        <p class="text-black/70 dark:text-white/70 text-lg mt-4">{{ $course->instructor ?? '' }}</p>

        {{-- <div class="flex justify-between border border-red-800 border-opacity-30 rounded-lg mt-4 p-3 w-full align-center">
            <h2 class="text-white font-semibold my-auto">Lanjutkan Course</h2>
            <a
                class="text-white cursor-pointer hover:bg-opacity-80 bg-red-800 p-2 px-4 font-semibold transition-all ease-in-out-100 duration-100">Progress
                Terakhir</a>
        </div> --}}

        <!-- TODO: create logic to fetch last user progress -->

        <!-- Course Description -->
        <p class="text-black dark:text-white text-md mt-4">{{ $course->course_description }}</p>
    </section>

    <!-- Courses Section -->
    <section class="mb-12 md:w-[80%] w-[90%]">

        @php
            // Sort the lessons available in the course
            $sortedLessons = collect($lessons['lesson'])->sortBy('order')->all();
            $lessons['lesson'] = $sortedLessons;
        @endphp

        <div class="flex flex-col gap-4" x-data="{ selectedAccordionItem: null }">
            @foreach ($lessons['lesson'] as $index => $lesson)
                @php
                    $lessonCompleted = in_array($lesson->id, $completedLessons ?? []);
                @endphp

                <div>
                    <button id="controlsAccordionItem{{ $index }}" type="button"
                        class="flex w-full items-center justify-between gap-4 p-4 text-left dark:*:text-white rounded-lg bg-black/5 dark:bg-bg-card dark:bg-opacity-10 hover:bg-black/10 dark:hover:bg-bg-card dark:hover:bg-opacity-5 transition-all duration-100 ease-in-out border border-black/10 dark:border-white/20"
                        aria-controls="accordionItem{{ $index }}"
                        x-on:click="selectedAccordionItem = selectedAccordionItem === {{ $index }} ? null : {{ $index }}"
                        x-bind:class="selectedAccordionItem === {{ $index }} ? 'dark:text-white text-black font-bold bg-black/10 dark:bg-gray-700' :
                            'text-black/70 dark:text-gray-300 font-medium'"
                        x-bind:aria-expanded="selectedAccordionItem === {{ $index }} ? 'true' : 'false'">

                        <div class="flex items-center gap-2">
                            {{ $lesson->lesson_name }}

                            @if ($lessonCompleted)
                                <!-- Green check icon to indicate completed lesson -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-green-500" viewBox="0 0 24 24"
                                    stroke="none">
                                    <path d="M9 16.2l-3.5-3.5-1.4 1.4L9 19 20.5 7.5l-1.4-1.4z" />
                                </svg>
                            @endif
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                            stroke="currentColor" class="size-5 shrink-0 transition text-black dark:text-white" aria-hidden="true"
                            x-bind:class="selectedAccordionItem === {{ $index }} ? 'rotate-180' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div x-cloak x-show="selectedAccordionItem === {{ $index }}"
                        id="accordionItem{{ $index }}" role="region"
                        aria-labelledby="controlsAccordionItem{{ $index }}" x-collapse>
                        <div class="p-4 text-sm sm:text-base dark:text-white rounded-b-lg bg-black/5 dark:bg-bg-card dark:bg-opacity-10">
                            @foreach ($lesson_parts as $lesson_part)
                                @if ($lesson_part->lesson_id === $lesson->id)
                                    @php
                                        $isCompleted = in_array($lesson_part->id, $completedParts ?? []);
                                    @endphp
                                    <div class="bg-black/5 text-black dark:text-white dark:bg-bg-card dark:bg-opacity-20 hover:bg-black/10 dark:hover:bg-opacity-10 p-4 flex justify-between mb-1 rounded-md cursor-pointer transition-all duration-150"
                                        @click="navigateTo('/learn/{{ $slug }}/{{ $lesson->slug }}/{{ $lesson_part->slug }}')">
                                        <div class="flex items-center my-auto gap-4 cursor-pointer">
                                            <!-- Checklist circle with conditional green fill -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512"
                                                fill="{{ $isCompleted ? '#22c55e' : 'none' }}"
                                                stroke="{{ $isCompleted ? 'none' : 'currentColor' }}" stroke-width="10">
                                                <circle cx="256" cy="256" r="200" />
                                            </svg>

                                            <p>{{ $lesson_part->part_name ?? 'Lesson Part' }}</p>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-black dark:fill-white"
                                            viewBox="0 0 640 640">
                                            <path
                                                d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z" />
                                        </svg>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
@endsection
