@extends('layouts.admin-layout')

@section('content')
    <div class="p-4">
        <div class="bg-white/5 rounded-3xl p-6 sm:p-8">
            <h1 class="text-2xl font-bold mb-2 text-red-400">Daftar Courses</h1>
            <p class="text-white/70 text-sm">Kelola kursus yang tampil pada aplikasi.</p>
        </div>

        <div class="w-full relative mt-6">
            <div id="datatable">
                @include('admin.courses._table')
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
                const searchForm = e.target.closest('#search-form');
                const deleteForm = e.target.closest('form[data-delete-course="1"]');

                if (searchForm) {
                    e.preventDefault();
                    const url = searchForm.action + '?search=' + encodeURIComponent(searchForm.search.value);

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

                if (deleteForm) {
                    e.preventDefault();
                    const confirmed = deleteForm.getAttribute('onsubmit') ? confirm('Yakin ingin menghapus course ini?') : true;
                    if (!confirmed) return;

                    const formData = new FormData(deleteForm);
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(deleteForm.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    })
                    .then(res => {
                        if (!res.ok && res.status !== 204) throw new Error('Delete failed');
                        // After successful deletion, refetch the current table content
                        return fetch(window.location.href, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                    })
                    .then(res => res.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newContent = doc.querySelector('#datatable-content');
                        container.innerHTML = newContent.innerHTML;
                    })
                    .catch(() => window.location.reload());
                }
            });
        });
    </script>
@endsection
