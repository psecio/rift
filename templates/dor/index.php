{% extends 'app.layout.php' %}

{% block content %}

<h3>Direct Object Reference</h3>

<blockquote style="font-size:13px">
According to OWASP, a direct object reference occurs when a developer exposes a reference to an internal implementation object, such as
a file, directory or database key. Without an access control check or other protection, attackers can manipulate these references to
access unauthorized data. The threat of insecure direct object reference flaws has become commonplace with the increased complexity of
web applications that provide varying levels of access to enable users to gain entry to some components, but not others.
<br/>
- <a href="http://codedx.com/insecure-direct-object-references/">Codedx</a>
</blockquote>

{% endblock %}
