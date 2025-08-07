@extends('layouts.admin-layout')

@section('content')
    <nav class="text-sm text-gray-600 mb-4" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.course.index') }}" class="text-blue-600 hover:underline">Courses</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.learn.index', $course->id) }}" class="text-blue-600 hover:underline">{{ $course->course_name }}</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.lesson-part.index', [$course->id, $learn->id]) }}" class="text-blue-600 hover:underline">{{ $learn->lesson_name }}</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-blue-800">Quizzes</li>
        </ol>
    </nav>

    <div class="p-4">
        <div class="w-full relative">
            <div id="quiz-datatable">
                @include('admin.quizzes._table', ['quizzes' => $quizzes])
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('#quiz-datatable');

            container.addEventListener('click', function (e) {
                const link = e.target.closest('[data-page-url]');
                if (link) {
                    e.preventDefault();
                    const url = link.getAttribute('data-page-url');

                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newContent = doc.querySelector('#quiz-datatable-content');
                        container.innerHTML = newContent.innerHTML;
                        window.history.pushState(null, '', url);
                    });
                }
            });

            container.addEventListener('submit', function (e) {
                const form = e.target.closest('#search-form');
                if (form) {
                    e.preventDefault();
                    const url = form.action + '?search=' + encodeURIComponent(form.search.value);

                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newContent = doc.querySelector('#quiz-datatable-content');
                        container.innerHTML = newContent.innerHTML;
                        window.history.pushState(null, '', url);
                    });
                }
            });
        });
    </script>
@endsection
