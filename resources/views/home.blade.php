<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Master</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @vite(['resources/css/custom.home.css', 'resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="container-fluid m-0 p-0 d-flex  " style="height: 100vh;" >
        <div class="sidebar h-100 bg-black text-light d-flex flex-column align-items-center">
            <div class="text-center  fs-1  p-3">{{ Auth::user()->name }}'s<br>Tasks</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
            <div class=" text-center fs-3  bg-light text-dark w-100"><b>Projects</b></div>

            <div class="projects mt-2 d-flex align-items-center flex-column w-100 overflow-auto">






                @foreach ($projects as $project)

                    <x-project :project="$project" />

                @endforeach


            </div>

            <button class="btn btn-primary rounded-circle p-0 mt-2 mb-2 " data-bs-toggle="modal" data-bs-target="#btn-project-create"  >
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                  </svg>
            </button>

            <div class="modal fade" id="btn-project-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h3 class="text-center text-dark">New Project </h3>
                    <div class="modal-body">
                        <form
                        action="{{ route('project.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class=""
                        >
                        @csrf
                        <input class="form-control m-2" type="text" name="title" placeholder="Title" required>
                        <input class="form-control m-2" type="text" name="description" placeholder="Description" required>


                        <button class="btn btn-primary m-2"> Create </button>
                    </form>
                    </div>

                  </div>
                </div>
              </div>

        </div>


        <div id="board" class="w-100 ">
            <div class="bord-content  w-90 h-75 overflow-hide">
                    <h1 class="project-title ">Reminders</h1>
                    <div class="tasks h-75  position-fixed ">
                        <div class="task row fs-5 text-light sticky-top title-bg-color fw-bold">
                            <div class="col-3 ">
                                Task
                            </div>
                            <div class="col-4 ">
                                Description
                            </div>
                            <div class="col-2 text-center">
                                Priority
                            </div>
                            <div class="col text-center">
                                Status
                            </div>
                            <div class="col  ">

                            </div>
                            <div class="col  ">

                            </div>



                        </div>
                        @foreach ($tasks as $task)
                            <x-task :task="$task"/>
                        @endforeach






                    </div>


                    <a href="{{ route('task.create') }}" class="btn btn-primary rounded-circle p-0 position-fixed" style="bottom: 20px; right: 20px;"  >
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                          </svg>
                    </a>
            </div>

            <ul>
                <a href="{{ route('task.index') }} " class="btn ">Task</a>
                <a href="{{ route('project.index') }}" class="btn">Project</a>
            </ul>


        </div>
        {{-- <script>
            const objDiv = document.getElementById("btn-project-create")
            objDiv.addEventlistener('onclick' , () => {
                const projetcs = document.querySelector('.projects')
                projetcs.scrollIntoView({ behavior: 'smooth', block: 'end' });

            })


        </script> --}}
    </body>
</html>
