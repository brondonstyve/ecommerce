<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Livreur</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @if ($ajouter)
                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal" wire:click='liste()'>liste</a>
                        @endif
                        @if ($liste)
                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
                            wire:click='ajouter()'>Ajouter</a>
                        @endif

                        @if ($modifier)
                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal" wire:click='liste()'>liste</a>

                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal"
                            wire:click='ajouter()'>Ajouter</a>
                        @endif
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
                            <h3 class="text-white mb-0">Liste de Livreur</h3>
                        </div>
                        @if (sizeOf($this->post)==0)
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
                                @foreach ($this->post as $item)
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
                                            <i class="ni ni-fat-delete text-red avatar avatar-sm rounded-circle"
                                             data-toggle="tooltip" data-original-title="Supprimer" data-target="#supp" wire:click="confSupp({{$item->id}})"></i>


                                            </div>


                                    </td>

                                    <td>
                                        <span wire:loading>Patientez...</span>
                                        @if ($supp==$item->id)
                                        <button type="button" class="btn btn-danger" wire:loading.remove wire:click="supprimer({{ $item->id }},{{$item->compte}})" id="btn-sup">Confirmer</button>
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

                        @if ($ajouter)
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Ajouter un livreur</h3>
                        </div>
                        <form wire:submit.prevent='ajouterLivreur'>
                            <table class="table align-items-center table-dark table-flush">
                                <div class="m-4">

                                    <div class="form-group">
                                        <label class="form-control-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" wire:model="nom"
                                            placeholder="Nom du livreur" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Prenom</label>
                                        <input class="form-control" type="text" name="prenom" wire:model="prenom"
                                            placeholder="Nom du livreur" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="form-control-label">téléphone</label>
                                        <input class="form-control" type="text" name="telephone" wire:model="telephone"
                                            placeholder="Numéro de téléphone" required>
                                    </div>

                                    
                                    <div class="form-group">
                                    <label class="form-control-label">Localisation</label>
                                        <input class="form-control" type="text" name="localisation" wire:model="localisation"
                                            placeholder="adresse de Localisation" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">CNI</label>
                                            <input class="form-control" type="number" name="cni" wire:model="cni"
                                                placeholder="numéro de cni" required>
                                        </div>
    
                                    

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-2" wire:target='image'
                                            wire:loading.remove>Enregistrer</button>
                                    </div>

                                </div>
                            </table>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>



        {{--  chargement d'image  --}}
    @include('layoutPages.voirImage')


</div>



