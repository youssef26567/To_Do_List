<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$page}}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="card text-center">
        <div class="card-header">
          {{$page}}
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$task->title}}</h5>
          <p class="card-text">{{$task->description}}</p>
          <a href="{{route('tasks.index')}}" class="btn btn-primary">Go Back</a>
        </div>
        <div class="card-footer text-muted">
            {{$task->status}}
        </div>
      </div>
</body>
</html>
