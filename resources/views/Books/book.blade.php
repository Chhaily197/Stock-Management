<!DOCTYPE html>
<html>

<head>
    @include('Books.link')
    <title>Books</title>
</head>

<body>
    @include('Books.Navbar')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body pb-0">
                        <a href="/create" class="btn btn-primary">Add Books</a>
                        @if ($info->isEmpty())
                            <h1>No available book.</h1>
                        @else
                            <table class="table table-border text-center" id="tbSt">
                                <tr>
                                    <th>Book ID</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Major</th>
                                    <th>Faculty</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Quantity</th>
                                    <th>Active</th>
                                </tr>
                                @foreach ($info as $item)
                                    <tr>
                                        <td>{{ $item->book_id }}</td>
                                        <td>{{ Str::limit($item->title, 6) }}</td>
                                        <td>{{ $item->price }} <span class="text-primary fw-bold">$</span></td>
                                        <td>{{ Str::limit($item->Majors, 6) }}</td>
                                        <td>{{ Str::limit($item->Faculty, 6) }}</td>
                                        <td>{{ Str::limit($item->Years, 6) }}</td>
                                        <td class="fw-bold">{{ Str::limit($item->Semester, 6) }}</td>
                                        @if ($item->Quantity >= 100)  
                                          <td class="text-primary fw-bold">{{ $item->Quantity }}</td>
                                        @elseif($item->Quantity >= 50)
                                          <td class="text-warning fw-bold">{{ $item->Quantity }}</td>
                                        @else
                                          <td class="text-danger fw-bold">{{ $item->Quantity }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('book.view', $item->book_id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('book.edit', $item->book_id)}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('book.delete', $item->book_id)}}" class="d-inline" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you want to delete this book?')"
                                                class="btn btn-danger btn-sm"
                                                ><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $info->links()}}
                        @endif
                    </div>
                </div>
            </div> 
        </section>
    </main>
</body>

</html>
