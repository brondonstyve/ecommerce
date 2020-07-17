
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="administrer/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="administrer/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="administrer/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="administrer/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="administrer/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="administrer/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="administrer/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="administrer/assets/js/argon.js?v=1.2.0"></script>

  @livewireScripts
</body>

</html>


<script>
  $(document).on('click','#voir',function(){
      $('#retirerImg').remove();
      var img=$(this).data('image');
      $('#recepteurImg').append('<img alt="Image placeholder" src="'+img+'" width="50%" style="border-radius: 10px" id="retirerImg"> ');
  });
</script>
