<!DOCTYPE html>
<html>
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{$page}}</title>
</head>
<body>
  <div class="container">
    <h1>{{$page}}</h1>
    <form  action="{{route('tasks.store')}}" method="POST">
@csrf
        <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
      </div>
           <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" name="due_date" id="date" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
