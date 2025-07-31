<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-white dark:bg-bg-dark">

    <h1 class="text-text-primary text-title text-center mt-12 mb-12">Courses</h1>
    <!-- Should be a container listing all courses available -->
     
    <section class="grid gap-4 h-full grid-cols-1 place-items-center w-full">

    @foreach( $courseData as $course)

        <div    class="h-64 lg:w-[700px] md:w-3/4 sm:w-3/4 bg-cover bg-center cursor-pointer overflow-hidden rounded-3xl" 
                style="background-image: url('{{ $course["courseImageURL"] }}')"
                onClick="window.location.href='/learn/{{ $course["slug"] }}'">

            <div    class="h-full flex flex-col justify-end p-6 hover:!bg-black/60 transition-all ease-in-out duration-100" 
                    style="background-color: rgba(1, 1, 1, 40%)">
                <h2 class="text-text-primary font-semibold text-6xl ">{{ $course["courseName"] }}</h2>
                <p class="text-text-primary">{{ $course["courseDescription"] }}</p>
            </div>
        </div>

    @endforeach

     </section>
    
</body>
</html>