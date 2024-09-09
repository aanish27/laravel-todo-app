<div class="project card text-center  p-2  m-3 w-75 " >
    <b>{{ $project->title }}</b>

    <div class="project-content toggle{{ $project->title }}">
        <div>{{ $project->description }}</div>

        <button class="d-inline btn edit  " data-bs-toggle="modal" data-bs-target="#btn-project-edit"  >
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg>
        </button>


        <form action="{{ route('project.destroy' , $project->id)}}"
            method="POST"
            class="d-inline"
            >
            @csrf
            @method('DELETE')
            <button class=" btn delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                  </svg>
            </button>
        </form>





        <div class="modal fade" id="btn-project-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                <h3 class="text-center text-dark">Edit Project </h3>
                <div class="modal-body">
                    <form
                        action="{{ route('project.update' , $project->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="d-flex justify-content-start flex-column  "
                        >
                        @csrf
                        @method('PUT')

                        <label class="text-start  form-label " for="title">Title</label>
                        <input class="form-control m-2" type="text" name="title" id="title" value="{{ $project->title }} " required >
                        <label class="form-label text-start" for="description">Description</label>
                        <input class="form-control m-2" type="text" name="description" id="description" value="{{ $project->description }}" required >
                        <button class="btn btn-primary align-self-center"> Edit </button>
                </form>
                </div>

              </div>
            </div>
          </div>


    </div>

</div>