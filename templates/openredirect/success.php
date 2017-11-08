{% extends 'app.layout.php' %}

{% block content %}

<h3>Open Redirect - Success!</h3>

<p>
    You're here because you clicked on the link on the previous page and it redirected you here based on the value
    in the <code>redirect_uri</code> value.
</p>
<p>
    Here's what that link looked like:<br/><br/>
    <code>
        &lt;a href="/openredirect?redirect_uri=/openredirect/success">Success!&lt;/a>
    </code>
</p>
<p>
    Notice how the <code>redirect_uri</code>is just like any other variable on the URL. In this case, though, it is being used
    to do something important - redirect the user to that location. Since anything on the URL is user-controllable, try changing that
    URL to something else, something external, and see what happens.
</p>

{% endblock %}
