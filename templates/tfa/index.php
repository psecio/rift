{% extends 'app.layout.php' %}

{% block content %}

<h2>Two-Factor Authentication</h2>

<p>
    Two-factor authentication (a subset of multi-factor authentication) provides an extra layer of protection on top
    of the standard authentication you already have. While username/password methods only require you to know the credentials
    to access the system, two-factor requires more. To be successful you need two of the three:
    <ul>
        <li>Something you know</li>
        <li>Something you have</li>
        <li>Something you are</li>
    </ul>
</p>
<hr/>
{% if imgData is defined %}
<p>
    Scan the image below with a HTOP-compatible client to set up the link.
</p>

<img src="data:image/png;base64,{{ imgData|raw }}"/>
<br/><br/>
{% endif %}

{% if success is defined and success == true %}
<span style="color:green">
    <h3 style="color:green">Success!</h3>
    <p>
        You've successfully verified the code for this user!
    </p>
</span>
<br/>
{% elseif success is defined and success == false %}
<span style="color:red">
    <h3 style="color:red">Fail!</h3>
    <p>
        D'oh - something went wrong and the code you input didn't verify.
    </p>
</span
<br/>
{% endif %}

<form class="form" action="/tfa" method="POST">
    <div class="form-group">
        <label for="input">Enter current code:</label>
        <input type="text" class="form-control" name="input"/>
    </div>
    <button class="btn" type="submit">Submit</button>
</form>

{% endblock %}
