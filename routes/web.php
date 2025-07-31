<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VirtualTourController;
use App\Http\Controllers\AboutController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'can:isAdmin'])->name('admin.')->group(function () {
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::patch('posts/{post}/toggle', [\App\Http\Controllers\Admin\PostController::class, 'toggle'])->name('posts.toggle');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('{slug}', [BlogController::class, 'show'])->name('show');
});


require __DIR__.'/auth.php';
Route::get('/virtual', [VirtualTourController::class, 'index']);
Route::get('/virtual/danautoba', [VirtualTourController::class, 'danautoba']);
Route::get('/virtual/airterjunPiso', [VirtualTourController::class, 'airterjunPiso']);
Route::get('/virtual/bukitHolbung', [VirtualTourController::class, 'bukitHolbung']);
Route::get('/virtual/sibeabea', [VirtualTourController::class, 'sibeabea']);
Route::get('/virtual/tamanAlamLubini', [VirtualTourController::class, 'tamanAlamLubini']);
Route::get('/virtual/arrasyid', [VirtualTourController::class, 'arrasyid']);
Route::get('/virtual/grahaBunda', [VirtualTourController::class, 'grahaBunda']);
Route::get('/virtual/funland', [VirtualTourController::class, 'funland']);


Route::get('/about', [AboutController::class, 'index']);
Route::get('/about/aksaranta', [AboutController::class, 'aksaranta']);
Route::get('/about/history', [AboutController::class, 'history']);
Route::get('/about/kamus', [AboutController::class, 'kamus']);
Route::get('/about/kamusAksara', [AboutController::class, 'kamusAksara']);

Route::get('/learn', function() {

    $courseData = [
        ["courseName" => "Aksara Batak",
        "courseDescription" => "Pelajari Script Batak",
        "courseImageURL" => "https://www.endangeredalphabets.net/wp-content/uploads/2018/12/Batak-Carving.jpg",
        "courseID" => 1,
        "slug" => "one"],
        ["courseName" => "Aksara Batak",
        "courseDescription" => "Pelajari Script Batak",
        "courseImageURL" => "https://www.endangeredalphabets.net/wp-content/uploads/2018/12/Batak-Carving.jpg",
        "courseID" => 1,
        "slug" => "one"],
        ["courseName" => "Aksara Batak",
        "courseDescription" => "Pelajari Script Batak",
        "courseImageURL" => "https://www.endangeredalphabets.net/wp-content/uploads/2018/12/Batak-Carving.jpg",
        "courseID" => 1,
        "slug" => "one"],
        
    ];

    return view('learn.index', compact('courseData'));
});

Route::get('/learn/{slug}', function($slug){
    $course = [
        "courseName" => "Aksara Batak",
        "courseDescription" => "Pelajari Script Batak",
        "courseImageURL" => "https://www.endangeredalphabets.net/wp-content/uploads/2018/12/Batak-Carving.jpg",
        "courseID" => 1,
        "slug" => "one",
    ];
    
    $lessons = [
        "lesson" => [
            [
                "lesson_id" => 1,
                "lesson_name" => "Sejarah Aksara",
                "order" => 1
            ],
            [
                "lesson_id" => 2,
                "lesson_name" => "Ina ni Surat",
                "order" => 2
            ],
            [
                "lesson_id" => 3,
                "lesson_name" => "Anak ni Surat",
                "order" => 3
            ],
            [
                "lesson_id" => 4,
                "lesson_name" => "Latihan Menulis",
                "order" => 3
            ]
            ],
        "course_id" => 1,
    ];

    $lesson_parts = [
        [
            "id" => 1,
            "lesson_id" => 1,
            "order" => 2,
            "part_name" => "Part One",
        ],
        [
            "id" => 2,
            "lesson_id" => 1,
            "order" => 3,
            "part_name" => "Part Two",
        ],
        [
            "id" => 3,
            "lesson_id" => 1,
            "order" => 4,
            "part_name" => "Part Three",
        ],
        [
            "id" => 1,
            "lesson_id" => 1,
            "order" => 2,
            "part_name" => "Part One",
        ],
        [
            "id" => 2,
            "lesson_id" => 1,
            "order" => 3,
            "part_name" => "Part Two",
        ],
        [
            "id" => 3,
            "lesson_id" => 1,
            "order" => 4,
            "part_name" => "Part Three",
        ],
    ];

    $user_lesson_progress = [
        "progress" => [
            [
                "lesson_part_id" => 1,
                "completed" => true,
            ],
            [
                "lesson_part_id" => 2, 
                "completed" => true,
            ],
            [
                "lesson_part_id" => 3, 
                "completed" => false,
            ]
        ]
    ];

    return view('learn.course', array_merge(["slug" => $slug], 
                compact('course', 'lessons', 'lesson_parts', 'user_lesson_progress')));
});