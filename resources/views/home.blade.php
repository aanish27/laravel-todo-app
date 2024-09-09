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


        <div id="board" class="w-100">
            <div class="bord-content  w-75">
                    <h1 class="project-title">Reminders</h1>
                    <table class=" table table-hover table-borderless " style="background-color:rgba(0, 0, 0, 0);">
                        <thead class=" " >
                            <th scope="col">Task</th>
                            <th scope="col">Description</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Status</th>

                        </thead>
                        <tbody  class="table-group-divider">
                            <tr>
                            <th scope="row">Wash Clothes</th>
                            <td>Take Clothes from the closet and Bin</td>
                            <td>High</td>
                            <td><input type="checkbox" style=""></td>
                            <td>
                                <button class="btn hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </button>
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                      </svg>
                                </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">Assignments</th>
                            <td>PRO , PCP and Pendings</td>
                            <td>High</td>
                            <td><input type="checkbox" style=""></td>
                            <td>
                                <button class="btn hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </button>
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                      </svg>
                                </button>
                            </td>

                            </tr>
                            <tr>
                            <th scope="row">Repair the tv</th>
                            <td>Claim Warranty</td>
                            <td>Low</td>
                            <td><input type="checkbox" style=""></td>
                            <td>
                                <button class="btn hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </button>
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                      </svg>
                                </button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
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
