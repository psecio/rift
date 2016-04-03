{% extends 'app.layout.php' %}

{% block content %}

<h3>Welcome to Rift</h3>

<br/>
<h4>Oh, hello there!</h4>
<p>
    Rift is a learning application that wants to help teach you some of the fundamentals around web application security with PHP.
    There are several lessons in the application, each covering a different vulnerability type. Instructions are provided for simple
    versions of the exploits, but don't be afraid to try out new things and experiement - that's the best way to learn.
</p>
<h4>Topics</h4>
<p>
    Most of the topics covered here are on the list of the <a href="https://www.owasp.org/index.php/Category:OWASP_Top_Ten_Project">Top 10</a>
    vulnerabilities put together by the OWASP (Open Web Application Security Project). That list is sorted by two main factors: how often
    vulnerability appears in applications and how easy they are to exploit.
</p>
<p>Lessons will cover these topics:</p>
<ul>
    <li>Cross-site Scripting</li>
    <li>Cross-site Request Forgery</li>
    <li>Direct Object Reference</li>
    <li>Remote File Include</li>
    <li>Local File Include</li>
</ul>

{% endblock %}
