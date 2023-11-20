<!-- views/logbook/index.php -->
{{ include('header.php', {title: 'Log Book'}) }}
<body>
    <div class="container">
        <h1>Log Book</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>Action</th>
                <th>Table Name</th>
                <th>Created At</th>
            </tr>
            {% for entry in logEntries %}
                <tr>
                    <td>{{ entry.user_id }}</td>
                    <td>{{ entry.action }}</td>
                    <td>{{ entry.table_name }}</td>
                    <td>{{ entry.created_at }}</td>
                </tr>
            {% endfor %}
        </table>
        <br><br>
    </div>
</body>
</html>
