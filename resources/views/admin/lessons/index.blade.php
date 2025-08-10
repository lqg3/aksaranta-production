@extends('layouts.admin-layout')

@section('content')
    <nav class="text-sm text-gray-600 mb-4" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.course.index') }}" class="text-blue-600 hover:underline">Courses</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="#" class="text-blue-800 hover:underline">{{ $course->course_name }}</a></li>
        </ol>
    </nav>

    <div class="p-4">
        <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
            <h1 class="text-2xl font-bold mb-2 text-red-400">Daftar Lesson - {{ $course->course_name }}</h1>
            <p class="text-white/70 text-sm">Kelola pelajaran dalam kursus "{{ $course->course_name }}" yang tampil pada
                aplikasi.</p>
        </div>

        <div class="w-full relative mt-6">
            <div id="lesson-datatable">
                @include('admin.lessons._table', ['lessons' => $lessons])
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('#lesson-datatable');

            container.addEventListener('click', function(e) {
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
                            const newContent = doc.querySelector('#lesson-datatable-content');
                            container.innerHTML = newContent.innerHTML;

                            window.history.pushState(null, '', url); // Update URL
                        });
                }
            });

            container.addEventListener('submit', function(e) {
                const form = e.target.closest('#search-form');
                if (form) {
                    e.preventDefault();
                    const url = form.action + '?search=' + encodeURIComponent(form.search.value);

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newContent = doc.querySelector('#lesson-datatable-content');
                            container.innerHTML = newContent.innerHTML;

                            window.history.pushState(null, '', url);
                        });
                }
            });
        });
    </script>
@endsection
