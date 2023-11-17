<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/clearncode.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .print-container,
        .print-container * {
            visibility: visible
        }
        .print-container{
            position: absolute;
            left: 0;
            top: 0;
            border: none;
            padding: 0px;
        }
        .print-container h5{
            font-size: 18px;
        }
        .datetime span{
            font-size: 18px;
        }
    }
</style>

<body>
    <main>
        <div class="container p-5">
            <div class="w-100 d-flex justify-content-end">
                <a href="{{ URL::to('lab_log')}}" class="btn btn-secondary px-3 m-1">Back</a>
                <button onclick="window.print();" class="btn btn-primary px-3 m-1 ">Print</button>
            </div>

            <div class="card p-5 print-container">
                <div class="title d-flex justify-content-between align-items-center">
                    <h2>INVOICE <span class="h4"> #{{ str_pad($log->log_id, 5, '0', STR_PAD_LEFT) }} </span><br>
                       
                            @if ($log->in_and_out == 'Out')
                                    <span class="h4 text-danger">OutStock</span>
                                     
                                    
                                @else
                                <span class="h4 text-success">OutStock</span>   
                                    
                         @endif
                        <span class="h5"> by {{ $log->username }}</span>
                        @php
                        
                            use Carbon\Carbon;
                            // Date-time string
                            $dateTimeString = $log->date;
                            // Extract the date (yyyy-mm-dd)
                            $date = substr($dateTimeString, 0, 10);
                            // Extract the time (hh:mm:ss)
                            $time = substr($dateTimeString, 11);
                            // Extract individual components
                            $year = substr($dateTimeString, 0, 4);
                            $month = substr($dateTimeString, 5, 2);
                            $day = substr($dateTimeString, 8, 2);
                            $monthName = date('F', strtotime("$month"));
                            // Convert the date-time string to the 12-hour format with AM and PM using Carbon
                            $formattedDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString)->format('h:i A');
                        @endphp
                       
                    </h2>
                    <div class="d-flex justify-content-end"><img src="{{ asset('assets/img/apple-touch-icon.png') }}" alt="" class="w-50"></div>
                </div>
                {{-- body  --}}
                <div class="body py-5 row">
                    <div class="col-12  p-5">
                        <div class="imageshow w-100 d-flex justify-content-center">
                            <img src="{{ asset('itlab_img_upload/' . $log->image_url) }}"
                                class="img-fluid rounded-start" alt="...">

                        </div>
                    </div>
                    <div class="col-6 pe-5">


                        <h4><span class="fw-bold">Category</span> : {{ $log->category_name }}</h4>
                        <h5 class="lh-lg">
                            <span class="fw-bold">Model Name</span> : {{ $log->item_model_name }} <br>
                            <span class="fw-bold">Item Code</span> : {{ $log->item_code }} <br>
                            <span class="fw-bold">Brand</span> : {{ $log->the_brand }} <br>
                            <span class="fw-bold">Description</span> : {{ $log->item_description }} <br>

                        </h5>
                    </div>
                    <div class="col-6 ps-5">
                        <h5 class="lh-lg">
                            <br>
                            Qty : {{ $log->qty }} <br>
                            Unit : {{ $log->unit }} <br>
                            Unit Price : {{ $log->unit_price }} $<br>
                            Total: {{ $log->total }} $

                        </h5>
                    </div>
                    <div class="col-12 d-flex justify-content-end datetime">
                       <div class="pe-5">
                        <br><br><br>
                        <span class="h5 fw-bold"> Date Time</span> <br>
                        <span class="h5"> {{ $day }} {{ $monthName }} {{ $year }}</span> <br>
                        <span class="h5">{{ $formattedDateTime }}</span>
                       </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @if (!session()->has('username'))
        <script>
            window.location.href = '/'
        </script>
    @endif
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
