{{ include('header.php', {title: 'Modele Edit'}) }}
<body>
    <div class="container">
        <form action="{{ path }}modele/update" method="post">
            <span class="text-danger">{{ errors | raw }}</span>
            <input type="hidden" name="id" value="{{ modele.id }}">
            <label>Modele Nom
                <input type="text" name="modele_nom" value="{{ modele.modele_nom }}">
            </label>
            <label>Manufacturier
                <input type="text" name="manufacturier" value="{{ modele.manufacturier }}">
            </label>
            <label>Pays
                <select name="modele_pays">
                    <option value="">Select a country</option>
                    {% for pays in paysList %}
                        <option value="{{ pays.id }}" {% if pays.id == modele.modele_pays %} selected {% endif %}>{{ pays.pays_nom }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Production Year
                <select name="production_year">
                    <option value="">Select a production year</option>
                    {% for production in productionList %}
                        <option value="{{ production.id }}" {% if production.id == modele.production_year %} selected {% endif %}>{{ production.year }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Format
                <select name="modele_format">
                    <option value="">Select a format</option>
                    {% for format in formatList %}
                        <option value="{{ format.id }}" {% if format.id == modele.modele_format %} selected {% endif %}>{{ format.format_nom }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Image Upload
                <input type="file" name="modele_image" accept="image/*">
            </label>

            <input type="submit" value="Save" class="btn">
        </form>
    </div>
</body>
</html>
