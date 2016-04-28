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
{% endblock %}
