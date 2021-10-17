<div class="section">
    <!-- container -->
    <div class="card-header mt-5 bg-transparent border-0">
        <h3 class=" text-center">Liste de mes commandes</h3>
    </div>

    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12 product">
                <br>
                <!-- Billing Details -->
                <div class="billing-details ">
                   
                    <div>
                        


                        <div class="container-fluid ">

                            
                            <!-- Dark table -->
                            <div class="row ">
                                <div class="col">
                                    <div class="card bg-default shadow">
                                        <div class="table-responsive">
                    
                    
                                            
                                            
                                            @if (sizeOf($commande)==0)
                                            <h3 class=" text-center">Aucune commande enregistrée pour le moment</h3>
                                            @else
                                            <table class="table align-items-center table-dark table-flush">
                    
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" class="sort">Produits(s)</th>
                                                        <th scope="col" class="sort">Montant</th>
                                                        <th scope="col" class="sort">Qté</th>
                                                        <th scope="col" class="sort">Total</th>
                                                        <th scope="col" class="sort">Date</th>
                                                        <th scope="col" class="sort">Adresse de livraison</th>
                                                        <th scope="col" class="sort">Statut</th>
                    
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @php
                                                        $code='';
                                                        $num=0;
                                                        $prix=0;
                                                    @endphp
                                                    @foreach ($commande as $key=>$item)
                                                    @if ($code!==$item->codeCom)
                                                    @php
                                                        $num ++;
                                                        $code=$item->codeCom;
                                                    @endphp
                                                        <tr>
                                                            <th colspan="5" class="text-uppercase">
                                                               Commande {{$num}}     :      {{ $item->codeCom }}     |    @if ($item->status==true) Livré @else Non Livré  @endif            |     Montant   :  {{$item->montant_total}}
                                                            </th>
                                                        </tr>
                                                    @endif
                                                    <tr class=" @if ($item->status==true) bg bg-primary @else bg bg-danger  @endif">
                                                        <td class="budget">
                                                            {{ $item->nom }}
                                                        </td>
                                                        <td class="budget">
                                                            {{ $item->montant }}
                                                        </td>
                                                        <td class="budget">
                                                            {{ $item->quantite }}
                                                        </td>
                                                        <td class="budget">
                                                            {{ $item->montant*$item->quantite }}
                                                        </td>
                                                        <td class="budget">
                                                            {{ $item->created_at }}
                                                        </td>
                                                        <td class="budget">
                                                            {{ $item->adresse }}
                                                        </td>
                                                        <td class="budget">
                                                            @if ($item->status==true)
                                                                Livré
                                                            @else
                                                                Non livré
                                                            @endif
                                                        </td>
                    
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    



                    </div>



                </div>
                <!-- /Billing Details -->
            </div>



            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->


</div>
