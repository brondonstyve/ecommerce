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
    var jour=7;
        var heure=24;
        var minute=60;
        var seconde=60;
        var tierce=60;


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



    setInterval(() => {

        if (seconde<=0) {
            seconde =60;
        }else{
        seconde --;
        }

        if (seconde<=0) {
        if (minute>0) {
            minute--;
        }

        }

        if (minute<=0) {
        if (heure>0) {
            heure--;
        }

        }

        if (heure<=0) {
        if (jour>0) {
            jour--;
        }else{
            jour=7;
        }

        }

        if (seconde==0) {
        seconde=60;
        }

        if (minute==0) {
        minute=60;
        }

        if (heure==0) {
        heure=24;
        }

        $('#sec').replaceWith('<h3 id="sec">'+seconde+'</h3>');
        $('#min').replaceWith('<h3 id="min">'+minute+'</h3>');
        $('#heure').replaceWith('<h3 id="heure">'+heure+'</h3>');
        $('#jour').replaceWith('<h3 id="jour">'+jour+'</h3>');
    }, 1000);
    });

    setInterval(() => {
        if (tierce>=0) {
            if (tierce==0) {
                tierce=60;
            } else {
                tierce--;
            }
        }
        $('#tierce').replaceWith('<h3 id="tierce">'+tierce+'</h3>');
    }, 1);


    $(document).on('click','.pannier',function(e){
        var id=$(this).data('id');
        var url='panier';

        $.get(url,{id:id},function(data){
            if (data==false) {
                window.location='Connexion';
            } else {
                if (data=='existant') {
                $('#btn').replaceWith('<button type="button" id="btn" class="btn btn-dark" style="background-color: black">Voir le panier</button>');
                $('.msg-panier').replaceWith('<p class="msg-panier">Ce produit est déjà present dans votre panier!<br> Consulter votre panier <a href="{{ route("mon_panier_path") }}">ici</a>.</p>');
                $('.notificateur').click();
                } else {
                $('#retirer-list').remove();
                $('#list').append('<div class="product-widget"  style="margin-bottom: -15%;margin-bottom: -5%">'+
                '<div class="product-img">'+
                    '<img src="./img/product01.png" alt="">'+
                '</div>'+
                '<div class="product-body">'+
                    '<h3 class="product-name"><a href="#">'+data[0].nom+'</a></h3>'+
                    '<h4 class="product-price"><span class="qty">'+data[0].quantite+' x </span>'+data[0].prix+'</h4>'+
                '</div>'+
                '<button class="delete"><i class="fa fa-close"></i></button>'+
            '</div><hr>');

            $('#qte-panier').replaceWith('<div class="qty" id="qte-panier" data-qte="'+($('#qte-panier').data('qte')+1)+'">'+($('#qte-panier').data('qte')+1)+'</div>');

            var st=parseFloat(($('#sous-total').data('st')+data[0].prix));
            var small=($('#small').data('small')+1);
            var small1=($('#small1').data('small1')+1);

            $('#small').replaceWith('<small id="smal" data-small="'+small+'">'+small+' produits selectionnés</small>');
            $('#small1').replaceWith('<small id="smal1" data-small1="'+small1+'">'+small1+' produits selectionnés</small>');
            $('#sous-total').replaceWith('<h5 id="sous-total" data-st="'+st+'">SOUS TOTAL: '+st+'</h5>');
              $('.msg-panier').replaceWith('<p class="msg-panier">Votre produit '+data[0].nom+' a été ajouté au panier avec succés!<br> Consulter votre panier <a href="{{ route("mon_panier_path") }}">ici</a>.</p>');
              $('.notificateur').click();
                }
            }
        })
    })





    $(document).on('click','.souhait',function(e){
        var id=$(this).data('souhait');
        var url='souhait';

        $.get(url,{id:id},function(data){
            if (data==false) {
                window.location='Connexion';
            } else {
                if (data=='existant') {
                $('.msg-panier').replaceWith('<p class="msg-panier">Ce produit est déjà present dans votre liste de souhait!<br> Consulter vos souhait <a href="{{ route("mes_souhaits_path") }}">ici</a>.</p>');
                $('.notificateur').click();
                } else {
                    var souhait=(parseInt($('#souhait').data('souhait'))+1)
              $('#souhait').replaceWith('<div class="qty" id="souhait" data-souhait="'+souhait+'">'+souhait+'</div>');
              $('.msg-panier').replaceWith('<p class="msg-panier">Votre produit '+data[0].nom+' a été ajouté à la liste de vos souhaits avec succés!<br> Consulter vos souhaits <a href="#!">ici</a>.</p>');
              $('.notificateur').click();
                }
            }
        })
    });


    window.addEventListener('AddPannier',event=>{
            $('#modal-large').modal('show');
    });


</script>
