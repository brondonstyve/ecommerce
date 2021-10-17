<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">

                    
                    
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Commandes </h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal" wire:click='wath("tout")'>Tout</a>
                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal" wire:click='wath("livre")'>Livré</a>
                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal" wire:click='wath("nlivre")'>Non Livré</a>
                        
                    </div>
                </div>
                @if (session()->has($flashType))
                <div class="alert alert-{{ $flashType }} alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">{{ session()->get($flashType) }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid ">

        <!-- Dark table -->
        <div class="row mt--6">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="table-responsive">


                        @if ($liste)
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Liste des Commandes</h3>
                        </div>

                        
                        <form class=" navbar-search-light form-inline mr-sm-3 mr-2" style="float: right">
                            <div class="form-group mb-2">
                              <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Rechercher" type="text" wire:model.debounce.1s='search'>
                              </div>
                            </div>
                          </form>


                        @if (sizeOf($this->post)==0)
                        <h3 class="text-white mb-0 text-center">Aucune Commande enregistrée pour le moment</h3>
                        @else
                        <table class="table align-items-center table-dark table-flush">

                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort">Code</th>
                                    <th scope="col" class="sort">Nom</th>
                                    <th scope="col" class="sort">Montant</th>
                                    <th scope="col" class="sort">Livreur</th>
                                    <th scope="col">statut</th>
                                    <th scope="col">Manipulations</th>
                                    <th scope="col">Validations</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($this->post as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->codeCom }}
                                    </th>
                                    <td class="budget">
                                        {{ $item->nom }}
                                    </td>
                                    <td class="budget">
                                        {{ $item->montant_total }}
                                    </td>
                                    <td class="budget">
                                        @if ($item->livreur)
                                            Oui
                                        @else
                                            /
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            @if ($item->status)
                                            <i class="bg-success"></i> Livré
                                            @else
                                            <i class="bg-warning"></i> Non Livré
                                            @endif

                                        </span>
                                    </td>

                                    <td id="{{ $item->codeCom }}">
                                        <div class="avatar-group"  wire:loading.remove>
                                            <a href="{{ route('commande_admin_detail_path',encrypt($item->codeCom)) }}">
                                            <i class="fa fa-eye text-red avatar avatar-sm rounded-circle"
                                             data-toggle="tooltip" data-original-title="Voir" ></i>
                                            </a>

                                            <i class="ni ni-fat-delete text-red avatar avatar-sm rounded-circle"
                                             data-toggle="tooltip" data-original-title="Supprimer" data-target="#supp" wire:click="confSupp('{{ $item->codeCom }}')"></i>

                                            <i class="ni ni-bulb-61 text-yellow avatar avatar-sm rounded-circle"
                                                data-toggle="tooltip" data-original-title="Confirmer la livraison"   wire:click='statut("{{ $item->codeCom }}")'></i>
                                            
                                                @if ($item->livreur)
                                                    <i class="fa fa-remove text-blue avatar avatar-sm rounded-circle"
                                                    data-toggle="tooltip" data-original-title="retirer le livreur"   wire:click='retirerLivreur("{{ $item->codeCom }}")'></i>
                                            
                                                    @else
                                                    <i class="fa fa-user text-blue avatar avatar-sm rounded-circle"
                                                    data-toggle="tooltip" data-original-title="Assigner à un livreur"   wire:click='assignerLivreur("{{ $item->codeCom }}")'></i>
                                                
                                                @endif
                                                

                                            </div>


                                    </td>

                                    <td>
                                        <span wire:loading>Patientez...</span>

                                        @if ($supp==55)
                                        @endif

                                        @if ($supp==$item->codeCom)
                                        <button type="button" class="btn btn-danger" wire:loading.remove wire:click="supprimer('{{ $item->codeCom }}')" id="btn-sup">Confirmer</button>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        <div class="mt-3 mr-2" style="float: right">
                            <nav aria-label="...">
                                {{ $this->post->links() }}
                            </nav>
                        </div>
                        @endif



                        @if ($livreur)
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Liste de Livreur</h3>
                        </div>

                        <form class=" navbar-search-light form-inline mr-sm-3 mr-2" style="float: right">
                            <div class="form-group mb-2">
                              <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Rechercher un livreur" type="text" wire:model.debounce.1s='searchLivreur'>
                              </div>
                            </div>
                          </form>
                        @if (sizeOf($this->ListLivreur)==0)
                        <h3 class="text-white mb-0 text-center">Aucun livreur enregistré pour le moment</h3>
                        @else

                        


                        <table class="table align-items-center table-dark table-flush">

                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort">Numéro</th>
                                    <th scope="col" class="sort">Nom + prénom</th>
                                    <th scope="col">téléphone</th>
                                    <th scope="col">localisation</th>
                                    <th scope="col">CNI</th>
                                    <th scope="col">Manipulations</th>
                                    <th scope="col">Validations</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($this->ListLivreur as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->id }}
                                    </th>
                                    <td class="budget">
                                        {{ $item->nom.' '.$item->prenom }}
                                    </td>
                                    <th scope="row">
                                        {{ $item->email }}
                                    </th>
                                    <th scope="row">
                                        {{ $item->localisation }}
                                    </th>
                                    <th scope="row">
                                        {{ $item->cni }}
                                    </th>


                                    <td id="{{ $item->id }}">
                                        <div class="avatar-group"  wire:loading.remove>
                                            <i class="fa fa-handshake-o text-red avatar avatar-sm rounded-circle"
                                             data-toggle="tooltip" data-original-title="assigner" data-target="#supp" wire:click="assigner({{$item->id}})"></i>
                                            </div>
                                    </td>

                                    <td>
                                        <span wire:loading>Patientez...</span>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        <div class="mt-3 mr-2" style="float: right">
                            <nav aria-label="...">
                                {{ $this->ListLivreur->links() }}
                            </nav>
                        </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>



</div>



