{% extends 'app.layout.php' %}

{% block content %}

<h3>Content Security Policy (CSP)</h3>

<p>
    A Content Security Policy (CSP) is another method of protecting your web application by restricting where assets
    can be loaded from and what kind of code can execute.
</p>
<p>
    If you open up your debug console in the browser, you'll see some of the messages from this page's CSP enforcement.
</p>

{% endblock %}
