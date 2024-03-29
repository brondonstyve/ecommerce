

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
      <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
          <a class="navbar-brand" href="javascript:void(0)">
            <img src="administrer/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
          </a>
        </div>
        <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="{{ route('index_admin_path') }}" class="nav-link active" href="examples/dashboard.html">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Administrer</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('collection_admin_path') }}" class="nav-link" href="examples/icons.html">
                  <i class="ni ni-planet text-orange"></i>
                  <span class="nav-link-text">Collection</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('produit_admin_path') }}">
                  <i class="ni ni-atom text-primary"></i>
                  <span class="nav-link-text">Produit</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('mes_couleurs_path') }}">
                  <i class="ni ni-ui-04 text-yellow"></i>
                  <span class="nav-link-text">Couleur</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('commande_admin_path') }}">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Commandes</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('livreur_admin_path') }}">
                  <i class="ni ni-circle-08 text-pink"></i>
                  <span class="nav-link-text">Livreur</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="examples/upgrade.html">
                  <i class="ni ni-send text-dark"></i>
                  <span class="nav-link-text">Upgrade</span>
                </a>
              </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading p-0 text-muted">
              <span class="docs-normal">Documentation</span>
            </h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                  <i class="ni ni-spaceship"></i>
                  <span class="nav-link-text">Getting started</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                  <i class="ni ni-palette"></i>
                  <span class="nav-link-text">Foundation</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                  <i class="ni ni-ui-04"></i>
                  <span class="nav-link-text">Components</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                  <i class="ni ni-chart-pie-35"></i>
                  <span class="nav-link-text">Plugins</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active active-pro" href="examples/upgrade.html">
                  <i class="ni ni-send text-dark"></i>
                  <span class="nav-link-text">Upgrade to PRO</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
