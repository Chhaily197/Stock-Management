<!DOCTYPE html>
<html>

<head>
    @include('Books.link')
    <title>Semester</title>
</head>

<body>
    @include('Books.Navbar')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body pb-0">
                        <a href="#" class="btn btn-primary" id="btnadd">Add Semester</a>
                        @if ($books->isEmpty())
                            <h1>No available year</h1>
                        @else
                            <table class="table table-border text-center" id="tbsem">
                                <tr>
                                    <th>ID</th>
                                    <th>Book title</th>
                                    <th>Quantities</th>
                                    <th>View</th>
                                </tr>
                                @foreach ($books as $item)
                                    <tr>
                                        <td>{{ $item->instock_id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
