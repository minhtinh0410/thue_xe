<!doctype html>
<html lang="vi">
  <head>
    <title>Thuê xe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" integrity="sha384-wxqG4glGB3nlqX0bi23nmgwCSjWIW13BdLUEYC4VIMehfbcro/ATkyDsF/AbIOVe" crossorigin="anonymous">

    {{-- link css datepicker --}}
    <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">

    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

  </head>
  <body class="bg-light" id="page-top" data-spy="scroll" data-offset="50">

    @include('layouts.header')
    <div class="container py-4" style="min-height: calc(100vh - 166px); margin-top: 56px">
        @yield('content')
    </div>    
    
    @include('layouts.footer')
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    

    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.vi.min.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            //Lên đầu trang
            $('[data-toggle="tooltip"]').tooltip();
            $("a[href='#page-top']").on("click", function(event) {
                event.preventDefault();
                var hash = this.hash;
                $("html, body").animate(
                    {
                        scrollTop: $(hash).offset().top
                    },
                    1000,
                    function() {
                        window.location.hash = hash;
                    }
                );
            });
            //Datepicker
            $('.js_my_date_picker').datepicker({
                format: 'dd/mm/yyyy',
                language: 'vi',
                weekStart: 1,
                endDate: new Date(),
                autoclose : true
            });
            //Datatable
            $('#myTable').DataTable();
        });
    </script>
    @yield('script')
    @stack('script')
  </body>
</html>