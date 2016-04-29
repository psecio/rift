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

<h4>Files</h4>
<ul>
{% for name,file in files %}
    <li><a href="/rfi?page={{ name }}">{{ name }}</a></li>
{% endfor %}
</ul>

{% if page is defined %}
    <h4>Page</h4>
    {{ page }}
{% endif %}

{% if isUrl is defined %}
<hr/>
<h4>Good Job!</h4>
<p>
    You figured out that you can put more than just the "page" name in the URL and bypass the local include to pull in your own content.<br/>
    You've seen how you can pull in your own text with a URL like <code>http://phparch.localhost/rfi?page=http://phparch.localhost/rfi/badtext?</code>
    but see what happens when you include something with PHP code:

    <pre><code>http://phparch.localhost/rfi?page=http://phparch.localhost/rfi/badcode?</code></pre>
</p>
<br/>
<h4>Prevention</h4>

<p>
    In this case, we know the location of the files that we're including so we need to check that before we include it:
    <pre><code class="php">&lt;?php
$page = $_GET['page'];
if (is_file($path)) {
    include_once $file;
}
?></code></pre>

    Also, if you know you're not going to need to include URLs from other sites, you can turn off the <code>allow_url_include</code>
    to "off":
    <br/><br/>
    <pre><code>allow_url_include=0</code></pre>
</p>
<br/><br/>
{% endif %}

{% endblock %}
