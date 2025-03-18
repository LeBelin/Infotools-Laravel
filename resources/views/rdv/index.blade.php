<style>
    .w3-container{
        width:85%;
        margin-left:2%;
        margin-top: 2%;
        margin-bottom:1%;
        height: 250px;
        text-align:center;
        border : 2px solid #343B61;
        overflow-y: auto; /* Ajoute un défilement vertical si le contenu dépasse */
        overflow-x: hidden; /
        
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
        width:17.5%;
        height: 405px;
        margin-right:2%;
        
        margin-bottom:1%;
        margin-top: -15%;
        text-align:center;
        border : 2px solid #343B61;
    }

    .w4-container{
        width:100%;
        margin-left:2%;
        margin-right:2%;
        margin-bottom:2%;
        height: 300px;
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


.form-container {
    width: 100%;
    max-width: 600px;
    background: #fff;
    border: 2px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Titre */
.form-container h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Groupes de formulaire */
.form-group {
    margin-bottom: 15px;
    display: inline-block;
    width: 48%; /* Chaque élément prend 48% de la largeur (avec un peu d'espace entre eux) */
    vertical-align:baseline; /* Aligne les éléments verticalement */
    

   
}
/* Style général pour la modale (fond flou ou sombre) */
.modal {
    display: none; /* Cachée par défaut */
    position: fixed; /* Fixe la position à l'écran */
    z-index: 1000; /* S'assure que la modale est au-dessus de tout */
    left: 0;
    top: 0;
    width: 100%; /* Pleine largeur */
    height: 100%; /* Pleine hauteur */
    background-color: rgba(0, 0, 0, 0.5); /* Fond sombre semi-transparent */
    justify-content: center;
    align-items: center;
    
}

/* Contenu de la modale */
.modal-content {
    background-color: #fff; /* Fond blanc */
    padding: 20px;
    border-radius: 8px;
    width: 50%; /* Largeur de la modale */
    max-width: 600px; /* Largeur maximale */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
    text-align: left;
    line-height: 3;
    
}

.modal-content h2 {
    
    text-align: center;
}

/* Bouton de fermeture */
.close {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 52px;
    font-weight: bold;
    color: white;
    cursor: pointer;
}

/* Labels */
.form-group label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

/* Inputs */
.form-group input,
.form-group select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

/* Bouton */
.btn-pers {
    width: 50%;
    padding: 10px;
    background-color: #5c85d6;
    color: #fff;
   margin-top: 1%;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-pers:hover {
    background-color: #466bb7;
}

</style>

<div id="main">

<div class="w3-container w3-blue">
<h2>Rendez-vous</h2>
                
                
                @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table" >
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
</div>
            <tr>
                <td>{{$rdv['id']}}</td>
                <td>{{$rdv['dateRendezVous']}}</td>
                <td>{{$rdv['descriptionRendezVous']}}</td>
                <td>{{ \Carbon\Carbon::parse($rdv->heureDebutRendezVous)->format('H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($rdv->heureFinRendezVous)->format('H:i') }}</td>
                <td>{{ $rdv->commerciaux->nomCommerciaux }} {{ $rdv->commerciaux->prenomCommerciaux }}</td>
                <td>{{ $rdv->clients->nomClient }} {{ $rdv->clients->prenomClient }}</td>
                <td> <form action="{{ route('rdv.destroy',$rdv->id) }}" method="POST">
                
                        

                        @csrf
                        @method('DELETE')
                        <button type="submit" >Supprimer</button>
                    </form>
                        
                    </td>
    
                    </form>
                

            </tr>
            @foreach($rendezvous as $rdv)
            <div id="modal" class="modal">
            
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
       
               
        <h2>Détails {{ $rdv ->id}} </h2>
        
        <strong>Identifiants :</strong>
        {{ $rdv->id }}
        <br>
        <strong>Date du rendez-vous :</strong>
        {{ $rdv->dateRendezVous }}
        <br>
        <strong>Description du rendez-vous :</strong>
        {{ $rdv->descriptionRendezVous }}
        @endforeach
    </div>
        <!-- Ajoutez ici les éléments que vous souhaitez montrer -->
    </div>
        @endforeach
        
        <script>
    // Ouvrir la modale
function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

// Fermer la modale
function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

// Fermer la modale si l'utilisateur clique en dehors du contenu
window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
        closeModal();
    }
}
</script>
    </table>
    
</div>

<div class="st1-nav">
    <a href="/index">Se deconnecter</a>
    
</div>



</div>

<div id="main">

<div class="w4-container w4-blue">
<h2>Prise de rendez-vous</h2>
                
                
<form method="post" action="{{url('rdv')}}" enctype="multipart/form-data">
@csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>Oops!</strong> Il y a des soucis dans votre formulaire.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
    <div class="form-group">
    <strong>Date du rendez-vous</strong>
        <input type="date" name="dateRendezVous">
    </div>
    <div class="form-group">
    <strong>Description du rendez-vous :</strong>
        <input type="text" name="descriptionRendezVous">
    </div>
    <div class="form-group">
    <strong>Heure de début</strong>
        <input type="time" name="heureDebutRendezVous">
    </div>
    <div class="form-group">         
    <strong>Heure de fin</strong>
        <input type="time" name="heureFinRendezVous">
    </div>
    <div class="form-group">
    <strong>Commerciaux associé</strong>
        <select name="idCommerciaux" >
            <option value="">Sélectionner un Commerciaux</option>
                @foreach($commerciaux as $commercial)
                    <option value="{{ $commercial->id }}">
                        {{ $commercial->id }} - {{ $commercial->nomCommerciaux }} {{ $commercial->prenomCommerciaux }}
                    </option>
                @endforeach
        </select>
    </div>
    <div class="form-group">
    <strong>Numéro Client :</strong>
            <select name="idClient" class="form-control">
                    <option value="">Sélectionner un Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">
                            N° {{ $client->id }} - {{ $client->nomClient }} {{ $client->prenomClient }}
                        </option>
                    @endforeach
                </select>
    </div>
                @foreach($users as $user)
                <input type="hidden" name="idUsers" value="{{ $user->id}}">
                @endforeach
        
                <button class="btn-pers" type="submit" class="btn btn-success">Ajouter</button>
            </div>
            
            <div class="st2-nav">
    <a href="commun/rdv">Page des commandes</a>
</div>
        </div>

        
 
</div>
</form>
    
</div>



</div>



