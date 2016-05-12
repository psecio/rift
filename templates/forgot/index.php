{% extends 'app.layout.php' %}

{% block content %}

<h3>Forgot Password</h3>

<p>
    So you've forgotten your password? It's okay, it happens to all of us from time to time.<br/>
    Enter your username in the form below and an email will be sent with more information.
</p>
<br/>
<div class="row">
    <div class="col-md-4">
    <form action="/forgot" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <input type="submit" name="sub" value="Submit" class="btn btn-success"/>
    </form>
    </div>
</div>

{% if hash is defined %}
<hr/>
<h4>Email Message:</h4>
<pre>

We recieved a password reset request for your username. To complete the process please click on the link below:
<a href="http://{{ host }}/forgot/hash/{{ hash }}">http://{{ host }}/forgot/hash/{{ hash }}</a>

</pre>
{% endif %}

{% endblock %}
