{% extends 'app.layout.php' %}

{% block content %}

<h3>Remember Me</h3>

{% if user is defined %}
    <h4><span style="color:green">You were remembered</span> - hello again user {{ user.username }}!</h4>
    <p>
        The remember me cookie was both correctly formatted and matched a user in the database. If this were a
        complete setup, you'd also want an expiration date on the cookie in the DB so it's not a "forever" token.
    </p>
    <br/>
{% else %}
    <p>
        You just logged in successfully as "ccornutt" and now the script is setting the "Remember Me" cookie.
    </p>
    <br/>
{% endif %}

<h4>The Code:</h4>
<pre><code class="php">{{ code }}</code></pre>

{% endblock %}
