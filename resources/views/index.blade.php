@extends('template')

@section('title', 'Accueil infotools')

@section('content')
    <!-- Section d'introduction -->
    <div class="intro">
        <div class="intro-content">
            <img src="{{ asset('image/logo.png') }}" alt="Custom Logo" class="logo">
            <h1>Bienvenue sur l'outil web de InfoTools</h1>
            <p>Un outil puissant pour gérer vos processus d'affaires. Découvrez une interface moderne et intuitive pour augmenter votre productivité.</p>
            <div class="cta-btn">
                <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
            </div>
        </div>
    </div>

    <!-- Section de fonctionnalités -->
    <div class="features">
        <h2>Nos fonctionnalités</h2>
        <div class="feature-cards">
            <div class="feature-card">
                <img src="{{ asset('image/img1.png') }}" alt="Feature 1">
                <h3>Gestion de projets</h3>
                <p>Suivez vos projets de manière simple et efficace.</p>
            </div>
            <div class="feature-card">
                <img src="{{ asset('image/img2.png') }}" alt="Feature 2">
                <h3>Rapports détaillés</h3>
                <p>Accédez à des rapports personnalisés pour prendre des décisions éclairées.</p>
            </div>
            <div class="feature-card">
                <img src="{{ asset('image/img3.png') }}" alt="Feature 3">
                <h3>Collaboration facile</h3>
                <p>Collaborez en temps réel avec votre équipe pour plus de productivité.</p>
            </div>
        </div>
    </div>




@endsection
