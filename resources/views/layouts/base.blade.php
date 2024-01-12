<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>



@include('partials.head')
<body>

    @include('partials.navbar')


    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @include('admin.scripts.global')
    @stack('scripts')
