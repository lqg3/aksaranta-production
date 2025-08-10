<x-lesson-layout :course="$course" :lessonName="$lesson->lesson_name" :lesson="$lesson" :lessonPart="$lessonPart" :completed="$completed" :isLogged="$isLogged">
    <div x-data="{ videoLoaded: false }" class="w-full">

        <!-- Video tab -->
        <div x-show="activeTab === 'video'" x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-600" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="w-full" id="video">

            <template x-if="!videoLoaded">
                <div class="w-full aspect-video flex items-center justify-center bg-bg-card bg-opacity-20 rounded-lg">
                </div>
            </template>

            <iframe x-show="videoLoaded" x-transition:enter="transition ease-in duration-600"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="w-full aspect-video border-none rounded-lg" src="{{ $lessonPart->part_video_url }}"
                title="Lesson Video" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" enablejsapi=1 allowfullscreen
                @load="videoLoaded = true" id="youtube-iframe">
            </iframe>
        </div>

        <!-- Notes tab -->
        <div x-show="activeTab === 'notes'" x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-600" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" id="notes">
            <h1 class="text-2xl font-bold">{{ $lessonPart->part_title }}</h1>
            @if (!empty($lessonPart->part_content))
                <div class="tinymce-content">
                    {!! $lessonPart->part_content !!}
                </div>
            @else
                <p>Tidak ada catatan untuk bagian ini.</p>
            @endif
        </div>

        <!-- Quiz tab -->
        <div x-show="activeTab === 'quiz'" x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-600" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" id="quiz">
            <h1 class="text-2xl font-bold">Quiz</h1>
            @if (!empty($lessonPart->quiz_content))
                <x-quizzes :quizzes="$lessonPart->quiz_content" :course_id="$course->id" :lesson_id="$lesson->id" :lesson_part_id="$lessonPart->id" />
            @else
                <p>Akan datang...</p>
            @endif
        </div>
    </div>
</x-lesson-layout>
