<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">
          <!-- Your dashboard content here -->
        </div>
        <!-- Close main-panel -->
      </div>
      <!-- Close container-scroller -->
    </div>

    @include('admin.script')
  </body>
</html>