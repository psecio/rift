{% extends 'app.layout.php' %}

{% block content %}

<h3>Open Redirect</h3>

<p>
    An <b>Open Redirect</b> vulnerability happens when you provide a method to an attacker for them to inject
    their own URL that the user is ultimately redirected to. Without the right kind of validation on the incoming
    value (input validation) your application is left open to this kind of attack.
</p>
<h4>Why is this an issue?</h4>
<p>
    Open redirects abuse the fact that a normal user doesn't look at the values on the URL, usually just the domain name (if
    anything at all). With an open redirect, the malicious content looks like it comes from the expected site but the user can
    easily be redirected to a malicious site.
</p>


<p>
    Click on the link below to see a reidrect in action:
    <br/></br>
    <a href="/openredirect?redirect_uri=/openredirect/success">Success!</a>
</p>


{% endblock %}
