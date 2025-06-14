@extends('front.layouts.app')
@section('content')


      <div id="search">
        <button type="button" class="close">×</button>
        <form class="search-overlay-form">
          <input type="search" value="" placeholder="type keyword(s) here" />
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
      <!--Header End-->
      <!--Slider Start-->
      <section id="home-slider" class="owl-carousel owl-theme wf100">
        <!-- Slide 1 -->
        <div class="item">
          <div class="slider-caption h2slider">
            <div class="container">
              <strong>Plantix<span> vous accompagne</span></strong>
              <h1>Diagnostic intelligent</h1>
              <p>
                Détectez les maladies de vos plantes en quelques secondes grâce
                à l’IA
              </p>
              <a href="#" class="active">Lancer une analyse</a>
              <a href="#">Découvrir l'outil</a>
            </div>
          </div>
          <img src="assets/images/h2-slide1.jpg" alt="" />
        </div>

        <!-- Slide 2 -->
        <div class="item">
          <div class="slider-caption h2slider">
            <div class="container">
              <strong><span>Protégez</span> vos cultures</strong>
              <h1>Prévention & traitement</h1>
              <p>
                Agissez rapidement contre les infections pour améliorer vos
                rendements
              </p>
              <a href="#" class="active">Explorer les solutions</a>
              <a href="#">Voir les maladies</a>
            </div>
          </div>
          <img src="assets/images/h2-slide2.jpg" alt="" />
        </div>

        <!-- Slide 3 -->
        <div class="item">
          <div class="slider-caption h2slider">
            <div class="container">
              <strong>Agir <span> avant qu’il ne soit trop tard</span></strong>
              <h1>Santé des plantes</h1>
              <p>
                Utilisez notre plateforme pour des cultures saines et durables
              </p>
              <a href="#" class="active">Commencer maintenant</a>
              <a href="#">Télécharger l'application</a>
            </div>
          </div>
          <img src="assets/images/h2-slide3.jpg" alt="" />
        </div>
      </section>

      <!--Slider End-->
      <!--Service Area Start-->
      <section class="services-area wf100">
        <div class="container">
          <ul>
            <!-- box 1 -->
            <li>
              <div class="sinfo">
                <img src="assets/images/sericon1.png" alt="" />
                <h6>Détection de maladies</h6>
                <p>Analyse intelligente des feuilles</p>
              </div>
            </li>

            <!-- box 2 -->
            <li>
              <div class="sinfo">
                <img src="assets/images/sericon2.png" alt="" />
                <h6>Conseils de traitement</h6>
                <p>Solutions adaptées pour chaque infection</p>
              </div>
            </li>

            <!-- box 3 -->
            <li>
              <div class="sinfo">
                <img src="assets/images/sericon3.png" alt="" />
                <h6>Reconnaissance visuelle</h6>
                <p>Scanner une plante avec votre téléphone</p>
              </div>
            </li>

            <!-- box 4 -->
            <li class="active">
              <div class="sinfo">
                <img src="assets/images/sericon4.png" alt="" />
                <h6>Suivi des cultures</h6>
                <p>Historique et évolution des maladies</p>
              </div>
            </li>

            <!-- box 5 -->
            <li>
              <div class="sinfo">
                <img src="assets/images/sericon5.png" alt="" />
                <h6>Bibliothèque de maladies</h6>
                <p>Fiches descriptives pour chaque symptôme</p>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <!--Service Area End-->
      <!--About Section Start-->
      <section class="home2-about wf100 p100 gallery">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="video-img">
                <a
                  href="https://vimeo.com/your-agri-video"
                  data-rel="prettyPhoto"
                  title="Video de détection des maladies"
                  ><i class="fas fa-play"></i
                ></a>
                <img
                  src="assets/images/plant-disease-detection.jpg"
                  alt="Détection des maladies des plantes"
                />
              </div>
            </div>
            <div class="col-md-7">
              <div class="h2-about-txt">
                <h3>À propos de PlantGuard</h3>
                <h2>Protéger vos cultures grâce à la technologie</h2>
                <p>
                  PlantGuard est une plateforme innovante qui détecte
                  automatiquement les maladies des plantes via l’analyse
                  d’assets/images, vous aidant à protéger vos récoltes et à maximiser
                  vos rendements agricoles.
                </p>
                <a class="aboutus" href="#">En savoir plus</a>
              </div>
            </div>
          </div>
        </div>
        <div class="home-facts counter pt80">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="counter-box">
                  <p class="counter-count">12000</p>
                  <p class="ctxt">Analyses effectuées</p>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="counter-box">
                  <p class="counter-count">3500</p>
                  <p class="ctxt">Agriculteurs satisfaits</p>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="counter-box">
                  <p class="counter-count">85%</p>
                  <p class="ctxt">Taux de détection précis</p>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-md-3">
                <div class="counter-box">
                  <p class="counter-count">150</p>
                  <p class="ctxt">Espèces de plantes analysées</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--About Section End-->
      <!--Urgent Causes Start-->
      <section class="urgent-causes wf100 p80">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="section-title-2 white">
                <h5>Cause Urgente</h5>
                <h2>Stop aux Maladies des Plantes</h2>
              </div>
              <p>
                Votre aide est essentielle pour protéger nos cultures contre les
                maladies. Chaque année, des milliers de récoltes sont perdues,
                menaçant la sécurité alimentaire. Ensemble, agissons pour des
                plantations saines et durables.
              </p>
              <div class="progress">
                <div
                  class="progress-bar"
                  role="progressbar"
                  style="width: 65%"
                  aria-valuenow="65"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
              <ul class="funds">
                <li class="text-left"><strong>65%</strong> Financé</li>
                <li class="text-center"><strong>$1300.00</strong> Collectés</li>
                <li class="text-right"><strong>$2000.00</strong> Objectif</li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="donation-amount">
                <h5>Montant du Don</h5>
                <form>
                  <ul class="radio-boxes">
                    <li>
                      <div class="radio custom">
                        <input
                          name="donation"
                          id="d1"
                          type="radio"
                          class="css-radio"
                        />
                        <label for="d1" class="css-label">$5</label>
                      </div>
                    </li>
                    <li>
                      <div class="radio custom">
                        <input
                          name="donation"
                          id="d2"
                          type="radio"
                          class="css-radio"
                        />
                        <label for="d2" class="css-label">$20</label>
                      </div>
                    </li>
                    <li>
                      <div class="radio custom">
                        <input
                          name="donation"
                          id="d3"
                          type="radio"
                          class="css-radio"
                        />
                        <label for="d3" class="css-label">$50</label>
                      </div>
                    </li>
                    <li>
                      <div class="radio custom">
                        <input
                          name="donation"
                          id="d4"
                          type="radio"
                          class="css-radio"
                        />
                        <label for="d4" class="css-label">$100</label>
                      </div>
                    </li>
                    <li>
                      <div class="radio custom">
                        <input
                          name="donation"
                          id="d5"
                          type="radio"
                          class="css-radio"
                        />
                        <label for="d5" class="css-label">$250</label>
                      </div>
                    </li>
                    <li>
                      <div class="radio custom">
                        <input
                          name="donation"
                          id="d6"
                          type="radio"
                          class="css-radio"
                        />
                        <label for="d6" class="css-label">$500</label>
                      </div>
                    </li>
                    <li>
                      <div class="radio custom">
                        <input
                          name="donation"
                          id="d7"
                          type="radio"
                          class="css-radio"
                        />
                        <label for="d7" class="css-label">$1000</label>
                      </div>
                    </li>
                    <li>
                      <div class="inputs">
                        <input
                          class="enter"
                          type="text"
                          placeholder="$ Autre montant"
                        />
                      </div>
                    </li>
                    <li class="form-submit">
                      <button type="submit">Continuer pour donner</button>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--Urgent Causes End-->
      <!--Current Projects Start-->
      <section class="wf100 p80 current-projects">
        <div class="container">
          <div class="mb-4 row align-items-center">
            <div class="col-lg-6">
              <div class="section-title-2">
                <h5>Nos travaux actuels</h5>
                <h2>Projets liés aux maladies des plantes</h2>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav" id="plantDiseaseTab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="tomato-tab"
                    data-toggle="tab"
                    href="#tomato"
                    role="tab"
                    aria-controls="tomato"
                    aria-selected="true"
                    >Maladies de la tomate</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="potato-tab"
                    data-toggle="tab"
                    href="#potato"
                    role="tab"
                    aria-controls="potato"
                    aria-selected="false"
                    >Maladies de la pomme de terre</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="citrus-tab"
                    data-toggle="tab"
                    href="#citrus"
                    role="tab"
                    aria-controls="citrus"
                    aria-selected="false"
                    >Maladies des agrumes</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="general-tab"
                    data-toggle="tab"
                    href="#general"
                    role="tab"
                    aria-controls="general"
                    aria-selected="false"
                    >Autres plantes</a
                  >
                </li>
              </ul>
            </div>
          </div>

          <div class="tab-content" id="plantDiseaseTabContent">
            <div
              class="tab-pane fade show active"
              id="tomato"
              role="tabpanel"
              aria-labelledby="tomato-tab"
            >
              <p>
                <strong
                  >Projet sur la lutte contre le mildiou et l’oïdium chez la
                  tomate :</strong
                >
                étude des traitements biologiques et prévention des infections.
              </p>
            </div>
            <div
              class="tab-pane fade"
              id="potato"
              role="tabpanel"
              aria-labelledby="potato-tab"
            >
              <p>
                <strong
                  >Projet sur les maladies fongiques de la pomme de terre
                  :</strong
                >
                identification des symptômes et développement de solutions
                naturelles.
              </p>
            </div>
            <div
              class="tab-pane fade"
              id="citrus"
              role="tabpanel"
              aria-labelledby="citrus-tab"
            >
              <p>
                <strong
                  >Projet sur la lutte contre la maladie de la rouille chez les
                  agrumes :</strong
                >
                techniques de contrôle intégrées et protection des récoltes.
              </p>
            </div>
            <div
              class="tab-pane fade"
              id="general"
              role="tabpanel"
              aria-labelledby="general-tab"
            >
              <p>
                <strong
                  >Projets divers sur la gestion des maladies courantes
                  :</strong
                >
                recherche de solutions écologiques pour différentes cultures
                potagères.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!--Current Projects End-->
      <!--News & Articles Start-->
      <section class="h2-news wf100 p80">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="section-title-2">
                <h5>Découvrez Nos Dernières</h5>
                <h2>Actualités & Articles sur les Plantes</h2>
              </div>
            </div>
            <div class="col-md-6">
              <a href="#" class="view-more">Voir Plus d'Articles</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="blog-post-large">
                <div class="post-thumb">
                  <a href="#"><i class="fas fa-link"></i></a>
                  <img src="assets/images/h2news1.jpg" alt="Plantation d'arbres" />
                </div>
                <div class="post-txt">
                  <ul class="post-meta">
                    <li>
                      <i class="fas fa-calendar-alt"></i> 29 Septembre 2018
                    </li>
                    <li><i class="fas fa-comments"></i> 134 Commentaires</li>
                  </ul>
                  <h5>
                    <a href="#"
                      >Planter des arbres : un geste vital pour notre planète</a
                    >
                  </h5>
                  <p>
                    Planter des arbres aide à purifier l’air, protéger la
                    biodiversité et lutter contre le changement climatique.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Blog Small Post Start -->
              <div class="blog-small-post">
                <div class="post-thumb">
                  <a href="#"><i class="fas fa-link"></i></a>
                  <img src="assets/images/h2news2.jpg" alt="Jardin écologique" />
                </div>
                <div class="post-txt">
                  <span class="pdate"
                    ><i class="fas fa-calendar-alt"></i> 29 Septembre 2018</span
                  >
                  <h5><a href="#">Créer un jardin écologique chez soi</a></h5>
                  <p>
                    Découvrez comment cultiver des plantes locales pour
                    préserver la faune et favoriser un écosystème sain.
                  </p>
                  <a href="#" class="rm">Lire la suite</a>
                </div>
              </div>
              <!-- Blog Small Post End -->
              <!-- Blog Small Post Start -->
              <div class="blog-small-post">
                <div class="post-thumb">
                  <a href="#"><i class="fas fa-link"></i></a>
                  <img src="assets/images/h2news3.jpg" alt="Protection des plantes" />
                </div>
                <div class="post-txt">
                  <span class="pdate"
                    ><i class="fas fa-calendar-alt"></i> 29 Septembre 2018</span
                  >
                  <h5>
                    <a href="#"
                      >Les plantes médicinales : un trésor à préserver</a
                    >
                  </h5>
                  <p>
                    Apprenez l’importance des plantes médicinales et comment les
                    protéger face aux menaces environnementales.
                  </p>
                  <a href="#" class="rm">Lire la suite</a>
                </div>
              </div>
              <!-- Blog Small Post End -->
            </div>
          </div>
        </div>
      </section>

      <!--News & Articles End-->
      <!--Why Ecova + Facts Start-->
      <section class="why-ecova wf100">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>Why Ecova!</h1>
              <p>
                Let’s Join us to do something awesome to Save Water, Energey,
                Control Pollution & Environment, Wildlife, Forest Planting
                Implant for Solar System.
              </p>
              <a href="#" class="cus">Signup to Join us</a>
            </div>
          </div>
        </div>
      </section>
      <!--Why Ecova + Facts End-->
      <!--Online Products Start-->
      <section class="online-shop wf100 p80">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="text-center section-title-2">
                <h5>Découvrez Nos Solutions</h5>
                <h2>Traitements et Produits contre les Maladies des Plantes</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!--Produit Start-->
            <div class="col-md-3 col-sm-6">
              <div class="product-box">
                <div class="pro-thumb">
                  <a href="#">Ajouter au Panier</a>
                  <img src="assets/images/pro1.jpg" alt="Fongicide naturel" />
                </div>
                <div class="pro-txt">
                  <h6><a href="#">Fongicide Naturel Bio</a></h6>
                  <p class="pro-price"><del>$35.00</del> $28.00</p>
                  <p>
                    Un traitement écologique pour lutter contre les champignons
                    responsables du mildiou et de l'oïdium.
                  </p>
                </div>
              </div>
            </div>
            <!--Produit End-->

            <!--Produit Start-->
            <div class="col-md-3 col-sm-6">
              <div class="product-box">
                <div class="pro-thumb">
                  <a href="#">Ajouter au Panier</a>
                  <img src="assets/images/pro2.jpg" alt="Insecticide bio" />
                </div>
                <div class="pro-txt">
                  <h6><a href="#">Insecticide Bio Anti-Aphides</a></h6>
                  <p class="pro-price"><del>$30.00</del> $24.00</p>
                  <p>
                    Protège vos plantes des attaques d'aphides sans nuire à
                    l'environnement ni aux insectes utiles.
                  </p>
                </div>
              </div>
            </div>
            <!--Produit End-->

            <!--Produit Start-->
            <div class="col-md-3 col-sm-6">
              <div class="product-box">
                <div class="pro-thumb">
                  <a href="#">Ajouter au Panier</a>
                  <img src="assets/images/pro3.jpg" alt="Engrais revitalisant" />
                </div>
                <div class="pro-txt">
                  <h6><a href="#">Engrais Revitalisant</a></h6>
                  <p class="pro-price"><del>$20.00</del> $15.00</p>
                  <p>
                    Favorise la résistance naturelle des plantes face aux
                    maladies grâce à une nutrition équilibrée.
                  </p>
                </div>
              </div>
            </div>
            <!--Produit End-->

            <!--Produit Start-->
            <div class="col-md-3 col-sm-6">
              <div class="product-box">
                <div class="pro-thumb">
                  <a href="#">Ajouter au Panier</a>
                  <img src="assets/images/pro4.jpg" alt="Spray antifongique" />
                </div>
                <div class="pro-txt">
                  <h6><a href="#">Spray Antifongique Rapide</a></h6>
                  <p class="pro-price"><del>$40.00</del> $32.00</p>
                  <p>
                    Traitement rapide contre les maladies fongiques pour
                    protéger feuilles et racines efficacement.
                  </p>
                </div>
              </div>
            </div>
            <!--Produit End-->
          </div>
        </div>
      </section>


@endsection
