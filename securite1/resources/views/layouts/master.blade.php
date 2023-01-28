
<!DOCTYPE html>
<html dir="rtl" lang="ar">


@include('layouts.css')
<body>

 @include('layouts.header')





  <!-- Scripts -->
  <script src="{{ asset('assets/nav/vendor/jquery/jquery.min.js') }}"></script>

  <script src="{{ asset('assets/nav/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/nav/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/nav/js/animation.js') }}"></script>
  <script src="{{ asset('assets/nav/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('assets/nav/js/custom.js') }}"></script>

  <script>
  // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();

      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });
  </script>
</body>
</html>
