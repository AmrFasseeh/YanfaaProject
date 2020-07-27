<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('master.styles')
    @yield('styles')
    <title>@yield('title')</title>
</head>

<body>
    @include('partials.menu')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
        @yield('content')
    </div>

</body>
@include('master.scripts')

@yield('scripts')

@include('master.footer')

</html>