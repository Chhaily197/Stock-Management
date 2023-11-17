<!DOCTYPE html>
<html>
<head>
    @include('Books.link')
    <title>OUTSTOCK</title>
</head>
<body>
    @include('Books.Navbar')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center py-4">OUTSTOCK</h1>
                    <div class="card-body pb-0">
                        @if ($outstock->isEmpty())
                            <h1>No available outstock</h1>
                        @else
                            <table class="table table-border text-center">
                                <tr class="table-success">
                                    <th class="text-primary">PO ID</th>
                                    <th class="text-primary">BOOK ID</th>
                                    <th class="text-primary">TITLE</th>
                                    <th class="text-primary">QUANTITY</th>
                                    <th class="text-primary">PRICE</th>
                                    <th class="text-primary">AMOUNT</th>
                                    <th class="text-primary">DATE</th>
                                    <th class="text-danger">Print Receipt</th>
                                </tr>
                                @foreach ($outstock as $item)
                                    <tr>
                                        <td>{{ $item->sale_id }}</td>
                                        <td>{{ $item->book_id }}</td>
                                        <td>{{ $item->Title }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="fw-bold">{{ $item->price }} $</td>
                                        <td class="fw-bold">{{ $item->amount }} $</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="/Receipt/:{{ $item->sale_id}}" class="btn btn-sm btn-primary">Print</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $outstock->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>