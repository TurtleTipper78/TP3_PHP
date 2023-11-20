{{ include('header.php', {title: 'User Create'}) }}
<body>
    <div class="container">
        <form action="{{ path }}user/store" method="post">
            <label>Username
                <input type="text" name="username" value="{{ user.username }}">
            </label>
            <label>Password
                <input type="password" name="password" value="">
            </label>
            <label>Privilege
                <select name="privilege_id">
                    <option value="">Select a privilege</option>
                    {% for privilege in privileges %}
                        <option value="{{ privilege.id }}" {% if privilege.id == user.privilege_id %} selected {% endif %}>
                            {{ privilege.level }}
                        </option>
                    {% endfor %}
                </select>
            </label>
            {% if errors is iterable %}
                <ul>
                    {% for error in errors %}
                        <li>{{ error }}</li>
                    {% endfor %}
                </ul>
            {% else %}
                <span class="text-danger">{{ errors | default('') }}</span>
            {% endif %}
            <input type="submit" value="Save" class="btn">
        </form>
    </div>
</body>
</html>
