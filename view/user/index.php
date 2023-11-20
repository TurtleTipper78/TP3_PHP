{{ include('header.php', {title: 'User List'}) }}
<body>
    <div class="container">
        <h1>Users</h1>
        <table>
            <tr>
                <th>Username</th>
                <th>Privilege Level</th>
            </tr>
            {% for user in users %}
                <tr>
                    <td>{{ user.username }}</td>
                    <td>{{ user.privilege.level }}</td>
                </tr>
            {% endfor %}
        </table>
        <br><br>
        <a href="{{ path }}user/create" class="btn">Add User</a>
    </div>
</body>
</html>
