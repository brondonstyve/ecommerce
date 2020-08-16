 <!-- ======= About Us Section ======= -->
 <section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Parlons de nous</h2>
        </div>

        <div class="row content">
            <div class="col-lg-6 text-justify">
                <p>
                    <i class="fa fa-check-circle text-secondary"></i> <strong>{{ env('APP_NAME') }}</strong> est tout d'abord un groupe de personnes specialisé dans la mise en place des solutions
                    numériques pour les entreprises et les particuliers. il nous a semblé bon de mettre sur pied une plateforme
                    de ecommerce pour permettre à des personnes dans le monde entier désirant offrir un bien à un proche au Cameroun (pour l'instant),
                    de le faire directement sur nôtre plateforme afin que le bien se fasse livrer au resident camerounais.
                </p>
                <ul>
                    <li><i class="fa fa-check"></i> Nous écoutons nos clients,</li>
                    <li><i class="fa fa-check"></i> Nous analysons, proposons, et satisfaisons nos clients,</li>
                    <li><i class="fa fa-check"></i> Nous nous assurons du respect des delais de livraison chez nos clients.</li>
                </ul>
                <br>
            <i class="fa fa-check-circle text-secondary"></i> <strong>Notre mission et nos valeurs</strong>
                <ul>
                    <li>
                        <i class="fa fa-check"></i>
                        Mission: Nous voulons être la plateforme de commerce électronique préférée dans le monde en matière d'achat à un point 'A' dans le monde pour etre livré soit sur place soit à un autre point dans le monde.
                    </li>

                    <li>
                        <i class="fa fa-check"></i>
                        Vision: Nous voulons faciliter le commerce entre deux point très éloigné.
                    </li>
                </ul>

                <br>
            <i class="fa fa-check-circle text-secondary"></i> <strong>Les valeurs fondamentales de {{ env('APP_NAME') }}:</strong>
            <ul>
                <li>
                    <i class="fa fa-check"></i>
                    service client, produits innovants, prix abordables, livraison rapide, travail d'équipe.
                </li>
            </ul>

            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 text-justify">
                <strong><i class="fa fa-check-circle text-secondary"></i> Avantages de {{ env('APP_NAME') }}</strong>

                <ul>
                    <li><i class="fa fa-check"></i>
                        Nous répondons aussi aux demandes des petites entreprises désirant se ravitailler en equipement en grande quantité. Chaque entreprise étant différente, le service est sur mesure en fonction de vos besoins.
                    </li>
                    <li><i class="fa fa-check"></i>
                        <strong>Prix abordables</strong><br>
                        Nos produits proviennent directement de fournisseurs étrangers. Cela nous donne l'avantage de négocier les prix des produits de qualité.
                    </li>
                    <li><i class="fa fa-check"></i>
                        <strong>Produits de qualité</strong><br>
                        Nous choisissons toujours les fournisseurs capables de produire des produits de haute qualité. Nous nous efforçons d'offrir les dernières modes et tendances dans tous les produits que nous proposons.
                    </li>
                    <li>
                        <i class="fa fa-check"></i>
                        <strong>Frais d'expédition imbattables</strong><br>
                        Nous avons établi un partenariat avec une entreprise de logistique et, grâce à nos propres moyen de logistique, nous permettons à nos clients d'économiser sur les frais de livraison.
                    </li>

                    <li>
                        <i class="fa fa-check"></i>
                        <strong>Services à la clientèle</strong><br>
                        Nous avons mis en place une équipe de services clients en ligne et hors ligne dans tous les pays où nous opérons et qui offrent des services personnalisés à nos clients.
                    </li>
                </ul>
            </div>
            <div class="text-center mt-2">
                <a href="{{ route('contact_path') }}" class="btn-learn-more">Contactez nous</a>
            </div>
</div>

    </div>

</section>

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Notre équipe</h2>
            <p>
                <Strong>{{ env('APP_NAME') }}</Strong> est constitué d'une varieté de membres de toute origine ethnique. nous travaillons sur la base du mérite.
                les dirigeants principaux sont:</p>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="img/team/avatar1.jpg" width="50%" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Jakin Youdom</h4>
                        <span>Directeur Général</span>
                        <p>Ingénieur DEVOPS & Technicien informaticien.</p>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""> <i class="fa fa-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">

                    <div class="pic"><img src="img/team/avatar1.jpg" width="50%" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Stiving tatga</h4>
                        <span>Directeur Général adjoint</span>
                        <p>Experte en Marketing digital. se mouvant également dans l'informatique.</p>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""> <i class="fa fa-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">

                    <div class="pic"><img src="img/team/avatar1.jpg" width="50%" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Brondon styve</h4>
                        <span>Chef des services</span>
                        <p>Ingénieur de Conception & Developpeur Fulstack.</p>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""> <i class="fa fa-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-6 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pic"><img src="img/team/avatar2.jpg" width="50%" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Magne Magne</h4>
                        <span>Chef Comptable</span>
                        <p>Expert comptable chargé d'assurer les document comptable.</p>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""> <i class="fa fa-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Team Section -->
