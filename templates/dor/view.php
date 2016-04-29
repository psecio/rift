{% extends 'app.layout.php' %}

{% block content %}

<h3>Direct Object Reference</h3>

<h3>User: {{ user.username }}</h3>

<b>Full Name:</b> {{ user.full_name }}
<br/>
<br/>
<a href="/dor">Back to list</a>

{% if userId > 2 %}
<br/><br/>
<h4>Good Job!</h4>
<p>
    You found a user that wasn't in the list on the other page just by guessing the ID in the URL. This is called a "direct object
    reference" because you were able to bypass security controlls (in this case if it was in the list or not) and find the data anyway.
</p>
<br/>
<h4>Prevention</h4>
<p>
    There's not one way to protect against Direct Object References, unfortunately. There are a few things to think about to help prevent
    it though:

    <ul>
        <li>Ensure good, consistent controls across everything.</li>
        <li>Always check the user making the request, never assume.</li>
        <li>Think about protected versus public object types.</li>
    </ul>

    An example of this is, when a path is requested, like the current one (<code>{{ path }}</code>), check the logged in user to be sure they have
    the right access - either permission or just "is authed" - to view the page.
</p>
{% endif %}

{% endblock %}
