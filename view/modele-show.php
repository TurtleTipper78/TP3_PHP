{{ include('header.php', {title: 'Modele Show'}) }}
<body>
    <div class="container">
        <h1>Details du modele</h1>

        <p><strong>Modele Nom:</strong> {{ modele.modele_nom }}</p>
        <img src="{{ modele.modele_image_path }}" alt="Model Image">    
        <p><strong>Manufacturier:</strong> {{ modele.manufacturier }}</p>
        <p><strong>Pays:</strong> {{ modele.pays.pays_nom }}</p>
        <p><strong>Production Year:</strong> {{ modele.production.year }}</p>
        <p><strong>Format:</strong> {{ modele.format.format_nom }}</p>
        <a href="{{ path }}modele/edit/{{ modele.id }}" class="btn">Modifier</a>
    </div>
</body>
</html>
