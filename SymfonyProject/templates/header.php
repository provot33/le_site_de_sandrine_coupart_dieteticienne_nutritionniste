<header>
  <!----début navbar------>
  {% if session.user is defined %}
            <div class="look_navbar">Bonjour {{session.user.first_name }} {{ session.user.last_name }}</div>
  {% endif %}
  <nav>
    <nav class="navbar navbar-inverse navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{ asset('build/images/sandrine coupart logo.png') }}" class="logo_site" alt="logo du site"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact"> Contactez-moi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/mes_recettes_healthy">Mes recettes healthy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/mentions_legales">Mentions légales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/politique_confidentialite">Politique de confidentialité</a>
            </li>
          </ul>
        </div>
{% if session.user is defined %}
    <li class="nav-item w-80" style="display:block" id="lien-deconnexion"><a class="nav-link" href="/logout">Déconnexion</a></li>
{% else %}
    <li class="nav-item ml-auto mr-1" style="display:block" id="lien-connexion"><a class="nav-link" href="/login">Connexion</a></li>
{% endif %}
      </div>
    </nav>
  </nav>
  <!----fin navbar------>
</header>
