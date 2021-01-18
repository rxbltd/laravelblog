<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name', 'Dashboard') }}</title>

    <!-- vendor css -->
    <link href="{{ asset('/assets/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/jquery-switchbutton/jquery.switchButton.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/chartist/chartist.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">


  

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/bracket.css') }}">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/toastr.min.css') }}">
@stack('css')

  </head>
 <body>

  @include('layouts.backend.partial.header')
  @include('layouts.backend.partial.sidebar')



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        @yield('content')
    
  @include('layouts.backend.partial.footer') 
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset('/assets/backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/moment/moment.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/peity/jquery.peity.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/chartist/chartist.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/bracket.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/dashboard.js') }}"></script>
    <script src="{{ asset('/assets/backend/lib/select2/js/select2.min.js') }}"></script>


@stack('js')
    <!-- Toastr JS -->
    <script src="{{ asset('/assets/backend/js/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {!! Toastr::message() !!}
    <script>

    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error!!', {
                closeButton:true,
                progressBar:true,
            });
        @endforeach
    @endif
    </script>
    
    @stack('js')
    
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

  </body>
</html>


