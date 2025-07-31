<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course["courseName"] }} - Aksaranta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="bg-bg-dark flex flex-col justify-center items-center">
    <!-- Header Section -->
    <section class="mt-24 mb-12 md:w-[80%] w-[95%]">
        <!-- Breadcrumbs -->
        <ul class="text-white/40 flex gap-2">
            <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100"><a href="./">Learn</a></li>
            <li class="!text-white/40">></li>
            <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">{{ $course["courseName"] }}</li>
        </ul>

        <!-- Course Title -->
        <h1 class="text-text-primary font-semibold text-title mt-4">{{ $course["courseName"] }}</h1>
        <p class="text-white/70 text-lg">Sofian Putri</p>

        <div
            class="flex justify-between border border-red-800 border-opacity-30 rounded-lg mt-4  p-3 w-full align-center">
            <h2 class="text-text-primary font-semibold my-auto">Lanjutkan Course</h2>
            <a
                class="text-text-primary cursor-pointer hover:bg-opacity-80 bg-red-800 p-2 px-4 font-semibold transition-all ease-in-out-100 duration-100}">Progress
                Terakhir</a>
        </div>

        <!-- TODO: create logic to fetch last user progress -->

        <!-- Course Description -->

        <p class="text-text-primary text-md mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa neque animi
            culpa unde fuga a sapiente modi provident. Impedit eveniet dolor ab sint corporis et repellat obcaecati,
            deleniti consectetur! Dolor adipisci exercitationem natus quae quaerat eos earum est, debitis nemo optio
            excepturi numquam facere placeat dolorum doloribus necessitatibus tempora et.</p>

    </section>

    <!-- Courses Section -->

    <section class="mb-12 md:w-[80%] w-[95%]">

    @php
        $sortedLessons = collect($lessons["lesson"])->sortBy('order')->all();
        $lessons["lesson"] = $sortedLessons;
    @endphp

    <div class="flex flex-col gap-4" x-data="{ selectedAccordionItem: null }">
    @foreach ($lessons["lesson"] as $index => $lesson)
        <div>
            <button id="controlsAccordionItem{{ $index }}" type="button" class="flex w-full items-center justify-between gap-4 p-4 text-left text-text-primary rounded-lg bg-bg-card bg-opacity-10 hover:bg-bg-card hover:bg-opacity-5 transition-all duration-100 ease-in-out border border-white/20" aria-controls="accordionItem{{ $index }}" x-on:click="selectedAccordionItem = selectedAccordionItem === {{ $index }} ? null : {{ $index }}" x-bind:class="selectedAccordionItem === {{ $index }} ? 'text-white font-bold bg-gray-700' : 'text-gray-300 font-medium'" x-bind:aria-expanded="selectedAccordionItem === {{ $index }} ? 'true' : 'false'">
                {{ $lesson["lesson_name"] }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" x-bind:class="selectedAccordionItem === {{ $index }} ? 'rotate-180' : ''">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                </svg>
            </button>
            <div x-cloak x-show="selectedAccordionItem === {{ $index }}" id="accordionItem{{ $index }}" role="region" aria-labelledby="controlsAccordionItem{{ $index }}" x-collapse>
                <div class="p-4 text-sm sm:text-base text-text-primary rounded-b-lg bg-bg-card bg-opacity-10">
                    <!--
                        1. Get the lesson_parts array
                        2. Of the  lesson_parts, get the lesson_part_id
                        3. Display the data
                     -->
                    @foreach ($lesson_parts as $lesson_part)
                        @php $lesson_id = $lesson_part['lesson_id'] @endphp
                        @php $completed = true @endphp
                        @if ($lesson_id === $lesson['lesson_id'])
                            @php
                                $checklist = "fill-white";
                                foreach($user_lesson_progress["progress"] as $progress) {
                                    if($progress["lesson_part_id"] === $lesson_part["id"]) {
                                        $checklist = $progress["completed"] ? 
                                            '<svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-green-600" viewBox="0 0 512 512"><path d="M0 256a256 256 0 1 1 512 0 256 256 0 1 1 -512 0z"/></svg>' : 
                                            '<svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-white" viewBox="0 0 512 512"><path d="M464 256a208 208 0 1 0 -416 0 208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0 256 256 0 1 1 -512 0z"/></svg>';
                                        break;
                                    }
                                }
                            @endphp

                        <div class="bg-bg-card bg-opacity-20 hover:bg-opacity-10 p-4 justify-between mb-1 rounded-md cursor-pointer">
                            <div class="flex items-center my-auto gap-4 cursor-pointer">
                                {!! $checklist !!}                      
                                <p>{{ $lesson_part['part_name'] }}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    

                </div>
            </div>   
        </div>
    @endforeach
    </div>
    
    <!-- Arrow Icon -->
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" x-bind:class="selectedAccordionItem === 'one'  ?  'rotate-180'  :  ''">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
    </svg> -->

    <script>
    </script>
        
    </section>
</body>

</html>