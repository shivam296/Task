<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cron Jobs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Cron Jobs</h1>
        <a href="{{ route('cron-jobs.create') }}" class="btn btn-primary mb-3">Create Cron Job</a>
        <table id="cronJobsTable" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Frequency</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cronJobs as $cronJob)
                    <tr>
                        <td>{{ $cronJob->name }}</td>
                        <td>{{ $cronJob->url }}</td>
                        <td>{{ $cronJob->frequency }}</td>
                        <td>
                            <form action="{{ route('cron-jobs.destroy', $cronJob) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional - if you need Bootstrap JS features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cronJobsTable').DataTable({
            	"ordering": false
            });
        });
    </script>
</body>
</html>
