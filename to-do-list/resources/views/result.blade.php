{{-- <h2>Search Results</h2>
@if($results->isEmpty())
    <p>No results found.</p>
@else
    <ul>
        @foreach($results as $result)
            <li>
                <h4>{{ $result->title }}</h4>
                <p>{{ $result->status }}</p>
            </li>
        @endforeach
    </ul>
@endif --}}
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  </head>
  <body>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col" >#</th>
            <th scope="col">title</th>
            <th scope="col">status</th>
            <th scope="col">due_date</th>
            <th scope="col">delete</th>
            <th scope="col">update</th>
            <th scope="col">delails</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($results as $index =>$result)
         <tr>
            <th scope="row">{{$index+1}}</th>
            <td> {{$result->title }}</td>
            <td style="color: green"> {{$result->status}}</td>
            <td> {{$result->due_date}}</td>
            <td>
                <form action="{{route('tasks.destroy',$result['id'])}}" method="POST">
                @csrf
                @method('Delete')
                <button type="submit" class="btn btn-danger">Delete</button>

                </form>
              </td>
              <td>
              <form action="{{route('tasks.edit',$result['id'])}}">
                <button type="submit" class="btn btn-warning" > Update
                </button>
              </form>

              </td>
              <td>
                <form action="{{route('tasks.show',$result['id'])}}"  >
                  <button type="submit" class="btn btn-success">Details</button>
                </form>

                </td>
        </tr>
            @endforeach
</body>
</html>

