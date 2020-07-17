

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

    @livewireScripts
</body>

</html>


<script>
    $(document).on('click','#voir',function(){
        $('#retirerImg').remove();
        var img=$(this).data('image');
        $('#recepteurImg').append('<img alt="Image placeholder" src="'+img+'" width="50%" style="border-radius: 10px" id="retirerImg"> ');
    });



    $(document).ready(function () {
        setInterval(() => {
        var size=$('#rafraichisseur').data('size');
        for (let index = 0; index < size; index++) {

            var image=$('#img'+index).val();
            image= image.split('|');
            var indice=parseInt(Math.random() * ((image.length) - 1) +1);

            $('#remplacer'+index).replaceWith('<img src="storage/'+image[indice]+'" alt="erreur image" id="remplacer'+index+'">');

        }
    }, 5000);

    });



</script>
