<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
</head>

<body>
    <div class="alert" role="alert">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>


    <div class="container p-4 mt-5 bg-gray-100 rounded">
        <h1>To Do List</h1>
        <form action="{{ route('kegiatan.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="d-flex gap-2">
                <input type="text" name="nama_kegiatan" class="form-control" placeholder="Add a new task" required>
                <select name="status" class="form-select" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                    <option value="selesai">Selesai</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
        </form>
    </div>

    <div class="container">
        <table class="table table-hover bordered ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatan as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>