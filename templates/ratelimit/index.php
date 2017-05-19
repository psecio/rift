{% extends 'app.layout.php' %}

{% block content %}

<h2>Rate Limiting</h2>

{% if blocked == true %}
<h3 style="color:red;font-weight:bold">You have been blocked!</h3>
<p>
    Requests from this IP have been blocked by rate limiting functionality.<br/>
    Please be patient and try your request later.
</p>
{% else %}
<h3 style="color:green;font-weight:bold">You're allowed!</h3>
<p>
    Requests from this IP are allowed but please don't abuse the system!
</p>
{% endif %}
<br/><br/>

<h4>Attempts</h4>
<pre>
{{ dump(attempts) }}
</pre>

{% endblock %}
