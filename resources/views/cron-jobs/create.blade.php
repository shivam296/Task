<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Form</h2>
                 
               <form action="{{ route('cron-jobs.store') }}" method="POST">
                  @csrf
                     <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Your Name">
                       
                    </div>
                     @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="mb-3">
                        <label for="url" class="form-label">Url</label>
                        <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}" placeholder="name@example.com">
                       
                    </div>
                        @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    <div class="mb-3">
                        <label for="frequency" class="form-label">Frequency</label>
                        <input class="form-control" id="frequency" name="frequency"  placeholder="*****" value="{{ old('frequency') }}">
                        
                    </div>

                    @error('frequency')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('cron-jobs.index')}}" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional - if you need Bootstrap JS features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
