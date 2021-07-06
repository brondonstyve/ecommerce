<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Cathégorie</h6>
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
                            <h3 class="text-white mb-0">Liste de couleur</h3>
                        </div>
                        @if (sizeOf($this->post)==0)
                        <h3 class="text-white mb-0 text-center">Aucune couleur enregistrée pour le moment</h3>
                        @else
                        <table class="table align-items-center table-dark table-flush">

                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort">Numéro</th>
                                    <th scope="col" class="sort">libellé</th>
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
                                        {{ $item->libelle }}
                                    </td>


                                    <td id="{{ $item->id }}">
                                        <div class="avatar-group"  wire:loading.remove>
                                            <i class="ni ni-settings text-black-50 avatar avatar-sm rounded-circle"
                                                data-toggle="tooltip" data-original-title="Modifier"  wire:click="modifier({{ $item->id }})"></i>

                                            <i class="ni ni-fat-delete text-red avatar avatar-sm rounded-circle"
                                             data-toggle="tooltip" data-original-title="Supprimer" data-target="#supp" wire:click="confSupp({{ $item->id }})"></i>

                                          <br>

                                            </div>


                                    </td>

                                    <td>
                                        <span wire:loading>Patientez...</span>
                                        @if ($supp==$item->id)
                                        <button type="button" class="btn btn-danger" wire:loading.remove wire:click="supprimer({{ $item->id }})" id="btn-sup">Confirmer</button>
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
                            <h3 class="text-white mb-0">Ajouter une couleur</h3>
                        </div>
                        <form wire:submit.prevent='ajouterCouleur'>
                            <table class="table align-items-center table-dark table-flush">
                                <div class="m-4">

                                    <div class="form-group">
                                        <label class="form-control-label">libellé</label>
                                        <input class="form-control" type="text" name="nom" wire:model="nom"
                                            placeholder="Libellé de la couleur" required>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-2" wire:target='image'
                                            wire:loading.remove>Enregistrer</button>
                                        <input type="button" class="btn btn-primary mt-2" wire:target='image' value="Patienter..."
                                            wire:loading>
                                    </div>

                                </div>
                            </table>
                        </form>
                        @endif

                        @if ($modifier)
                        <form wire:submit.prevent='confModif({{ $num }})'>
                        <table class="table align-items-center table-dark table-flush">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="text-white mb-0">Modifer une couleur</h3>
                            </div>
                                <div class="m-4">

                                    <div class="form-group">
                                        <label class="form-control-label">libellé</label>
                                        <input class="form-control" type="text" placeholder="Libellé de la couleur"
                                            id="example-text-input" value="{{ $nom }}" wire:model='nom'>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary mt-2" value="Modifier"      wire:target='image' wire:loading.remove>
                                        <input type="button" class="btn btn-primary mt-2" value="Patienter..."  wire:target='image' wire:loading>
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



</div>



