<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      @include('includes.head')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      @include('includes.header2')
      <!-- @include('includes.leftside') -->
         @yield('content')
      @include('includes.modal')
      @include('includes.footer')
   </body>
</html>
