<style>
    .w3-container{
        width:85%;
        margin-left:2%;
        margin-top: 2%;
        margin-bottom:1%;
        height: 175px;
        text-align:center;
        border : 2px solid #343B61;
       
        
    }
    .table {
        margin-left:auto;
        margin-right:auto;
        border : 2px solid grey;
        border-collapse : collapse;

        width: 90%;
        margin-bottom:1%;
        
    }

    .table th{
    
        border : 2px solid grey;
        background : #5cb5f8;
        text-align : center;
    }

    .table td {
    
        border : 2px solid grey;
        background : white;
        text-align : center;
    }

    .table1 {
        margin-left:10%;
        margin-right:10%;
        border-collapse : collapse;
        display: inline;
        width: 90%;
        margin-bottom:1%;
        
    }

    .table1 th{
    
        border : 2px solid grey;
        background : #5cb5f8;
        text-align : center;
    }

    .table1 td {
    
        border : 2px solid grey;
        background : white;
        text-align : center;
    }

    .w3bis-container{
        width:85%;
        margin-left:2%;
        margin-bottom:1%;
        height: 175px;
        text-align:center;
        border : 2px solid #343B61;
    }

    #main {
        display : flex;
    }

    body{
background : #F6E6D1;
    }

    
    .st1-nav{
        width:15%;
        
        margin-right:2%;
        margin-left:2%;
        margin-bottom:12%;
        margin-top: 2%;
        height: 50px;
        text-align:center;
        border : 2px solid #343B61;
    }

    .st2-nav{
        width:15%;
        padding-bottom:25%;
        margin-right:2%;
        margin-left:2%;
        margin-bottom:2%;
        margin-top: -11%;
        text-align:center;
        border : 2px solid #343B61;
    }

    .w4-container{
        width:100%;
        margin-left:2%;
        margin-right:2%;
        margin-bottom:2%;
        height: 130px;
        text-align:center;
        border : 2px solid #343B61;
        
    }

    h1 {
  color: #fff;
  text-shadow:
    3px 1px 1px #000,
    -3px 3px 2px #000,
    -3px -3px 0 #000,
    3px -3px 0 #000;
}
</style>

@if (Auth::check())
    <h2>Bonjours, {{ Auth::user()->name }}</h2><br>
@else
    <h2>Bonjours, invité</h2><br>
@endif


<div id="main">

<div class="w3-container w3-blue">
<h2>Dernier rendez-vous</h2>
                
                
                @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table" id="myTable">
        <tr>
            <th>ID</th>
            <th>Date du RDV</th>
            <th>Description</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Commerciaux associé</th>
            <th>Client Concerné</th>
        </tr>
        @foreach($rendezvous as $rdv)
            <tr>
                <td>{{$rdv['id']}}</td>
                <td>{{$rdv['dateRendezVous']}}</td>
                <td>{{$rdv['descriptionRendezVous']}}</td>
                <td>{{ \Carbon\Carbon::parse($rdv->heureDebutRendezVous)->format('H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($rdv->heureFinRendezVous)->format('H:i') }}</td>
                <td>{{ $rdv->commerciaux->nomCommerciaux }} {{ $rdv->commerciaux->prenomCommerciaux }}</td>
                <td>{{ $rdv->clients->nomClient }} {{ $rdv->clients->prenomClient }}</td>
                <td>
                <form action="{{ route('commun.destroy',$rdv->idRendezVous) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('commun.show',$rdv->idRendezVous) }}">Détails</a>
                        <a class="btn btn-primary" href="{{ route('commun.edit',$rdv->idRendezVous) }}">Editer</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>

            </tr>

        @endforeach
    </table>
    
</div>

<div class="st1-nav">
<form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="text-blue-500 hover:text-blue-700">Se déconnecter</button>
    </form>
</div>

</div>

<div id="main">

<div class="w3bis-container w3-blue">
<h2>Dernier achat effectuer</h2>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table" id="myTable">
        <tr>
            <th>ID de la facture</th>
            <th>Date de la facture</th>
            <th>Montant total</th>
            <th>Statut du réglement</th>
            <th>Date du Paiement</th>
            <th>Client Concerné</th>
        </tr>
        @foreach($factures as $facture)
            <tr>
            <td>{{$facture['idFacture']}}</td>
                <td>{{$facture['dateFacture']}}</td>
                <td>{{$facture['montantTotal']}}</td>
                <td>{{$facture['statutFacture']}}</td> <!-- Mettre un If pour que ce soit des lettre et non un "1"-->
                <td>{{$facture['datePaiement']}}</td>
                <td>{{ $facture->clients->nomClient }} {{ $facture->clients->prenomClient }}</td>
                <td>
                
                <a class="btn btn-info" href="{{ route('commun.show',$facture->idFacture) }}">Détails</a>
                    </form>
                </td>

            </tr>

        @endforeach
    </table>
</div>

<div class="st2-nav">
    <a href="http://infotools.test/rdv">Page des commandes</a>
</div>

</div>


<div id="main">

<div class="w4-container">
<h2>Produit phare</h2>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table1" id="myTable">
        <tr>
        <th colspan="2">IMG</th>
        <th colspan="2">IMG</th>
            
        </tr>
        @foreach($produits as $produit)
            <tr>
            
                <td>{{$produit['nomProduit']}}</td>
                <td>{{$produit['prixUnitaire']}} €</td>
                
                
                
        
            </tr>

        @endforeach
    </table>
</div>


