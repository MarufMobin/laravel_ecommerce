<!DOCTYPE html>
<html lang="en">
  <head>
    
  @include('backend.includes.header')
  
  @include('backend.includes.css')
  </head>

  <body>

    @include('backend.includes.menu')
    @include('backend.includes.topbar')
    @include('backend.includes.rightmenu')

  

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      
      @yield('container')

      @include('backend.includes.footer')

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
   
    @include('backend.includes.script')

  </body>
</html>
