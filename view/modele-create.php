{{ include('header.php', {title: 'Modele Create'}) }}
<body>
    <div class="container">
        <form action="{{ path }}modele/store" method="post">
            <label>Modele Nom
                <input type="text" name="modele_nom">
            </label>
            <label>Manufacturier
                <input type="text" name="manufacturier">
            </label>
            <label>Pays
                <select name="modele_pays">
                    {% for pays in selectPays %}
                        <option value="{{ pays.id }}">{{ pays.pays_nom }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Production Year
                <select name="production_year">
                    {% for production in selectProductions %}
                        <option value="{{ production.id }}">{{ production.year }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Format
                <select name="modele_format">
                    {% for format in selectFormats %}
                        <option value="{{ format.id }}">{{ format.format_nom }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Image Upload
                <input type="file" name="modele_image" accept="image/*">
            </label>

            <input type="hidden" name="createur_id" value="{{ loggedUserId }}">

            <input type="submit" value="Save" class="btn">
        </form>
    </div>
</body>
</html>
