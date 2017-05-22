{% extends 'app.layout.php' %}

{% block content %}

<h2>Authentication & Authorization</h2>
<p>
    Auth flaws, another issue on the <a href="https://www.owasp.org/index.php/Category:OWASP_Top_Ten_Project">OWASP Top 10 list</a>, is one
    of the most difficult and complex parts of a web application. Auth flaws are a "gateway" to a wide range of other issues and incorrect
    handling can be one of the most dangerous issues for the security of your application.
</p>
<br/>
<p>
    <h3>Authentication:</h3>
    Proving the identity of the end user/service.
    <br/><br/>
    <ul>
    <li><a href="/password">Password Hashing</a></li>
    <li><a href="/forgot">Forgot Password</a></li>
    <li><a href="/auth/login">Login</a></li>
    </ul>
</p>
<br/>
<p>
    <h3>Authorization:</h3>
    Providng the user/service has access required to perform the requested action.
    <br/><br/>
    <ul>
        <li><a href="/dor">Direct Object Reference</a></li>
        <li><a href="/auth/signup">Registration</a></li>
    </ul>
</p>

{% endblock %}
