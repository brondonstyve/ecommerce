<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Produit</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @if ($ajouter)
                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal"
                            wire:click='liste()'>liste</a>
                        @endif
                        @if ($liste)
                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
                            wire:click='ajouter()'>Ajouter</a>
                        @endif

                        @if ($modifier)
                        <a href="#" class="btn btn-sm btn-neutral mt-2" data-toggle="modal"
                            wire:click='liste()'>liste</a>

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
                            <h3 class="text-white mb-0">Liste de Produits</h3>
                        </div>
                        @if (sizeOf($this->post)==0)
                        <h3 class="text-white mb-0 text-center">Aucun Produit enregistré pour le moment</h3>
                        @else
                        <table class="table align-items-center table-dark table-flush">

                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort">cathégorie</th>
                                    <th scope="col" class="sort">Nom</th>
                                    <th scope="col" class="sort">Marque</th>
                                    <th scope="col" class="sort">Prix</th>
                                    <th scope="col" class="sort">quantité</th>
                                    <th scope="col">image</th>
                                    <th scope="col" class="sort">Statut</th>
                                    <th scope="col">Manipulations</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($this->post as $item)
                                <tr>
                                    <th class="">
                                        {{ $item->collection }}
                                    </th>
                                    <td>
                                        {{ $item->nom }}
                                    </td>

                                    <td class="text-uppercase">
                                        {{ $item->marque }}
                                    </td>

                                    <td>
                                        {{ $item->prix }}
                                    </td>

                                    <td>
                                        {{ $item->quantite }}
                                    </td>

                                    <td>
                                        @php
                                        $image=explode('|',$item->image);
                                        @endphp
                                        @foreach ($image as $key=>$value)
                                        @if ($key!=0)
                                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="modal"
                                            data-target="#voirImage" id="voir" data-image="{{'storage/'.$value }}"
                                            title="cliquer pour voir l'image">
                                            <img alt="Image" src="{{'storage/'.$value }}">
                                        </a>
                                        @else

                                        @endif
                                        @endforeach

                                    </td>

                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            @if ($item->statut)
                                            <i class="bg-success"></i> actif
                                            @else
                                            <i class="bg-warning"></i> inactif
                                            @endif

                                        </span>
                                    </td>



                                    <td id="{{ $item->id }}">
                                        <div class="avatar-group" wire:loading.remove>
                                            <i class="ni ni-settings text-black-50 avatar avatar-sm rounded-circle"
                                                data-toggle="tooltip" data-original-title="Modifier"
                                                wire:click="modifier({{ $item->id }})"></i>

                                            <i class="ni ni-fat-delete text-red avatar avatar-sm rounded-circle"
                                                data-toggle="tooltip" data-original-title="Supprimer"
                                                data-target="#supp" wire:click="confSupp({{ $item->id }})"></i>

                                            <i class="ni ni-bulb-61 text-yellow avatar avatar-sm rounded-circle"
                                                data-toggle="tooltip"
                                                data-original-title="@if($item->statut==true) Desactiver @else Activer @endif"
                                                wire:click='statut({{ $item->id }})'></i>
                                            <br>

                                        </div>
                                        <span wire:loading>Patientez...</span>
                                        @if ($supp==$item->id)
                                        <button type="button" class="btn btn-danger" wire:loading.remove
                                            wire:click="supprimer({{ $item->id }})" id="btn-sup">Confirmer</button>
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
                            <h3 class="text-white mb-0">Ajouter une Produit</h3>
                        </div>
                        <form wire:submit.prevent='ajouterProduit'>
                            <table class="table align-items-center table-dark table-flush">
                                <div class="m-4">

                                    <div class="form-group">
                                        <label class="form-control-label">Cathégorie</label>
                                        <select class="form-control" type="text" wire:model="cathegorie"
                                            placeholder="Nom de la Produit" required>
                                            @foreach ($this->cathegories as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Nom</label>
                                        <input class="form-control" type="text" wire:model="nom"
                                            placeholder="Nom de la Produit" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Marque</label>
                                        <input class="form-control" type="text" wire:model="marque"
                                            placeholder="Marque du Produit" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Prix</label>
                                        <input class="form-control" type="number" wire:model="prix" min="0"
                                            placeholder="Prix du Produit" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Quantité</label>
                                        <input class="form-control" type="number" wire:model="qte" min="1"
                                            placeholder="Quantité du Produit" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Couleur (Maintenez la touche controle *ctrl* puis sélectionnez autant de couleur que vous voulez)</label>
                                        <select multiple="" class="form-control" id="exampleFormControlSelect2" wire:models.lazy='couleur'>
                                          @foreach ($this->couleurs as $coul)
                                           <option value="{{ $coul->id }}" > {{ $coul->libelle }} </option>
                                          @endforeach
                                        </select>
                                      </div>

                                    <label class="form-control-label">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" name="image"
                                            multiple wire:model="image" max="5" id="mesImages" required>
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                    @if (session()->has('image_error'))
                                    <label class="text-red">{{ session()->get('image_error') }}</label>
                                    @endif

                                    @if ($image)
                                    <div class="row mt-3">
                                        @foreach ($image as $id=>$item)
                                        <div class="card" style="width: 10rem;display: inline-block">
                                            <div class="card-body">
                                                <h5 class="text-center">Aperçu {{ $id+1 }}</h5>
                                            </div>
                                            <img class="card-img-top" src="{{ $item->temporaryUrl() }}"
                                                alt="Card image cap">

                                        </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-2" wire:target='image'
                                            wire:loading.remove>Enregistrer</button>
                                        <input type="button" class="btn btn-primary mt-2" wire:target='image'
                                            value="Patienter..." wire:loading>
                                    </div>

                                </div>
                            </table>
                        </form>
                        @endif

                        @if ($modifier)
                        <form wire:submit.prevent='confModif({{ $num }})'>
                            <table class="table align-items-center table-dark table-flush">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="text-white mb-0">Modifer une Produit</h3>
                                </div>
                                <div class="m-4">


                                        <div class="form-group">
                                                <label class="form-control-label">Cathégorie</label>
                                                <div class="input-group">
                                                <select class="form-control" type="text" wire:model="cathegorie"
                                                    placeholder="Nom de la Produit" required>
                                                    @foreach ($this->cathegories as $item)
                                                    <option @if($cathegorie==$item->id) class="active" @endif value="{{ $item->id }}">{{ $item->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    <div class="form-group">
                                        <label class="form-control-label">Nom</label>
                                        <input class="form-control" type="text" wire:model="nom"
                                            placeholder="Nom de la Produit" value="{{ $nom }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Marque</label>
                                        <input class="form-control" type="text" wire:model="marque"
                                            placeholder="Marque du Produit" value="{{ $marque }}" required>
                                    </div>

                                    <div class="form-group">

                                        <label class="form-control-label">Prix</label>
                                        <input class="form-control" type="number" wire:model="prix"
                                            placeholder="Prix du Produit" value="{{ $prix }}" min="0" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Quantité</label>
                                        <input class="form-control" type="number" wire:model="qte" min="1" value="{{ $qte }}"
                                            placeholder="Quantité du Produit" required>
                                    </div>

                                    <label class="form-control-label">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" name="image"
                                            multiple wire:model="image" max="5" id="mesImages">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                    @if (session()->has('image_error'))
                                    <label class="text-red">{{ session()->get('image_error') }}</label>
                                    @endif

                                    @if ($image)
                                    <div class="row mt-3">
                                        @foreach ($image as $id=>$item)
                                        <div class="card" style="width: 10rem;display: inline-block">
                                            <div class="card-body">
                                                <h5 class="text-center">Aperçu {{ $id+1 }}</h5>
                                            </div>
                                            <img class="card-img-top" src="{{ $item->temporaryUrl() }}"
                                                alt="Card image cap">

                                        </div>
                                        @endforeach
                                    </div>
                                    @endif


                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary mt-2" value="Modifier"
                                            wire:target='image' wire:loading.remove>
                                        <input type="button" class="btn btn-primary mt-2" value="Patienter..."
                                            wire:target='image' wire:loading>
                                    </div>

                                    @if ($imageAnc)

                                    @php
                                    $imageMod=explode('|',$imageAnc);
                                    @endphp

                                    <div class="row mt-3 text-center">

                                        @foreach ($imageMod as $key=>$value)
                                        @if ($key!=0)
                                        <div class="card" style="width: 10rem;display: inline-block">
                                            <div class="card-body">
                                                <h5 class="text-center">Aperçu {{ $key+1 }}</h5>
                                            </div>
                                            <img class="card-img-top" src="{{'storage/'.$value }}" alt="Card image cap">

                                        </div>
                                        @endif
                                        @endforeach
                                    </div>

                                    @endif



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
