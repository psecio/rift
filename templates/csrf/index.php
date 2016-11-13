{% extends 'app.layout.php' %}

{% block content %}

<h3>Cross-Site Request Forgery (CSRF)</h3>

<blockquote style="font-size:13px">
Cross-site request forgery, also known as one-click attack or session riding and abbreviated as CSRF (sometimes pronounced sea-surf) or
XSRF, is a type of malicious exploit of a website where unauthorized commands are transmitted from a user that the website trusts. Unlike
cross-site scripting (XSS), which exploits the trust a user has for a particular site, CSRF exploits the trust that a site is in a
user's browser.
<br/>
- <a href="https://en.wikipedia.org/wiki/Cross-site_request_forgery">Wikipedia</a>
</blockquote>

<p>
    A CSRF token has been generated and added as a hidden field to the form below. It has also been saved to the session so that when the form
    is submitted they can be compared. If they match, the form was submitted on our site and by the current user (the one who belongs to the
    session).
</p>

{% if error is defined %}
    {% if error == true %}
        <div class="alert alert-danger">Token mismatch - action not taken!</div>
    {% else %}
        <div class="alert alert-success">Thanks for logging in!</div>
    {% endif %}
{% endif %}

<div class="col-md-6">
<form method="POST" action="/csrf" class="form">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username"/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password"/>
    </div>
    <div class="form-group">
        <input type="submit" name="sub" value="Submit" class="btn"/>
    </div>

    <input type="hidden" name="csrf-hash" value="{{ csrfHash }}">
</form>
</div>

<br/>

{% endblock %}
