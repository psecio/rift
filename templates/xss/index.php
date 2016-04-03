{% extends 'app.layout.php' %}

{% block content %}

<h3>Cross-Site Scripting (XSS)</h3>

<ul>
    <li><a href="/xss/reflected">Reflected</a></li>
    <li><a href="/xss/stored">Stored</a></li>
    <li><a href="/xss/dom">DOM</a></il>
</ul>

{% endblock %}
