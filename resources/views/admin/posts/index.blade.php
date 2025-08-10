@extends('layouts.admin-layout')

@section('content')
    <div class="p-4">
        <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
            <h1 class="text-2xl font-bold mb-2 text-red-400">Daftar Post</h1>
            <p class="text-white/70 text-sm">Kelola artikel blog yang tampil pada aplikasi.</p>
        </div>

        <div class="w-full relative mt-6">
            <div id="datatable">
                @include('admin.posts._table')
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('#datatable');

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
                            const newContent = doc.querySelector('#datatable-content');
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
                            const newContent = doc.querySelector('#datatable-content');
                            container.innerHTML = newContent.innerHTML;

                            window.history.pushState(null, '', url);
                        });
                }
            });
        });
    </script>
@endsection
