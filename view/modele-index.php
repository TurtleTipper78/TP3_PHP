{{ include('header.php', {title: 'Modele List'}) }}
<body>
    <div class="container">
        <h1>Modele</h1>
        <table>
            <tr>
                <th>Modele Nom</th>
                <th>Manufacturier</th>
                <th>Pays</th>
                <th>Production Year</th>
                <th>Format</th>
                <th>Delete</th>
            </tr>
            {% for modele in modeles %}
                <tr>
                    <td><a href="{{ path }}modele/show/{{ modele.id }}">{{ modele.modele_nom }}</a></td>
                    <td>{{ modele.manufacturier }}</td>
                    <td>{{ modele.pays.pays_nom }}</td>
                    <td>{{ modele.production.year }}</td>
                    <td>{{ modele.format.format_nom }}</td>
                    <td>
                        <form action="{{ path }}modele/destroy" method="post">
                            <input type="hidden" name="id" value="{{ modele.id }}">
                            <input type="submit" value="Delete" class="btn-danger">
                        </form>
                    </td>
                </tr>
            {% endfor %}
        </table>
        <br><br>
        <a href="{{ path }}modele/create" class="btn">Add Modele</a>
    </div>
</body>
</html>
