<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('assets/images/favicon1.png') }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @include('components.styles')
    </head>
    <body>
        <div class="container-scroller"> 
          <!-- partial:partials/_navbar.html -->
          @include('components.navbar')
          <!-- partial -->
          <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('components.sidebar')
            <!-- partial -->
            <div class="main-panel">
                @if(session('status'))
                    {!! session('status') !!}
                @endif
                @yield('content')
                <!-- partial footer -->
                @include('components.footer')
            </div>
            <!-- main-panel ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        @include('components.scripts')
      </body>
</html>
