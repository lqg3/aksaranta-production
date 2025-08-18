@extends('layouts.learn-layout')

@section('title', 'Courses')

@section('content')
    <h1 class="text-black dark:text-white text-title text-center mt-24 mb-12 font-title">Pelajari Aksara & Semua Hal Batak</h1>
    <!-- Should be a container listing all courses available -->

    <section class="grid gap-4 h-full grid-cols-1 place-items-center w-full">

        @foreach($courseData as $course)
            
            <div class="h-64 lg:w-[700px] md:w-3/4 w-3/4 bg-cover bg-center cursor-pointer overflow-hidden rounded-3xl"
                style="background-image: url('{{ $course->image_url }}')"
                @click="navigateTo('/learn/{{ $course->slug }}')">
                <div>
                </div>
                <div class="h-full flex flex-col justify-end p-6 group transition-all ease-in-out duration-600"
                    style="background-color: rgba(0, 0, 0, 0.4)"
                    :class="{'!bg-black/60': true}">
                    <div class="absolute">
                        <h2 class="text-text-primary font-semibold md:text-6xl text-3xl ">{{ $course->course_name }}</h2>
                        <p class="text-text-primary" style="width:85%">{{ \Illuminate\Support\Str::limit($course->course_description, 65) }} </p>
                    </div>
                    <div class="flex justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="size-5 fill-black dark:fill-white opacity-0 group-hover:opacity-100 transition-all duration-600 ease-in-out transform translate-y-8 group-hover:translate-y-0"
                             viewBox="0 0 640 640">
                            <!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/>
                        </svg>
                    </div>
                </div>
            </div>

        @endforeach

    </section>
@endsection