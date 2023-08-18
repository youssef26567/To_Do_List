<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>{{$page}}</title>
  </head>
  <body>
    <h1  style="padding-left: 40%">{{$title}}</h1>
    <div class="container mt-5">
      <form action="{{route('tasks.search')}}" method="POST">
        @csrf
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ old('search') }}">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">Search</button>
              </div>
          </div>
      </form>
  </div>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col" >#</th>
            <th scope="col">title</th>
            {{-- <th scope="col">description</th> --}}
            <th scope="col">status</th>
            <th scope="col">due_date</th>
            <th scope="col">delete</th>
            <th scope="col">update</th>
            <th scope="col">delails</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($tasks as $index =>$task)
         <tr>
            <th scope="row">{{$index+1}}</th>
            <td> {{$task->title}}</td>
            {{-- <td> {{$task->description}}</td> --}}
<td style="color: green"> {{$task->status}}</td>


            <td> {{$task->due_date}}</td>
            <td>
                <form action="{{route('tasks.destroy',$task['id'])}}" method="POST">
                @csrf
                @method('Delete')
                <button type="submit" class="btn btn-danger">Delete</button>

                </form>
              </td>
              <td>
              <form action="{{route('tasks.edit',$task['id'])}}">
                <button type="submit" class="btn btn-warning" > Update
                </button>
              </form>

              </td>
              <td>
                <form action="{{route('tasks.show',$task['id'])}}"  >
                  <button type="submit" class="btn btn-success">Details</button>
                </form>

                </td>
        </tr>
         @endforeach

        </tbody>

      </table>

        <div class="d-flex justify-content-center align-items-center" style="height: 10vh;">
            <a href="{{route('tasks.create')}}" class="btn btn-lg btn-primary">Create a New Task</a>
          </div>
          {{-- {{ $tasks->links() }} --}}
   </body>
</html>
