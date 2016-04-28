{% extends 'app.layout.php' %}

{% block content %}

<h3>Remote File Include (RFI)</h3>

<blockquote style="font-size:13px">
Remote File Include (RFI) is an attack technique used to exploit "dynamic file include" mechanisms in web applications. When web applications
take user input (URL, parameter value, etc.) and pass them into file include commands, the web application might be tricked into including
remote files with malicious code.

Almost all web application frameworks support file inclusion. File inclusion is mainly used for packaging common code into separate files
that are later referenced by main application modules. When a web application references an include file, the code in this file may be
executed implicitly or explicitly by calling specific procedures. If the choice of module to load is based on elements from the HTTP request,
the web application might be vulnerable to RFI.
<br/>
- <a href="http://projects.webappsec.org/w/page/13246955/Remote%20File%20Inclusion">WebAppSec.org</a>
</blockquote>

{% endblock %}
