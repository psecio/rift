{% extends 'app.layout.php' %}

{% block content %}

<h3>Cross-Site Scripting (XSS)</h3>

<blockquote style="font-size:13px">
Cross-site scripting (XSS) is a type of computer security vulnerability typically found in web applications. XSS enables attackers to inject
client-side scripts into web pages viewed by other users. A cross-site scripting vulnerability may be used by attackers to bypass access
controls such as the same-origin policy. Cross-site scripting carried out on websites accounted for roughly 84% of all security
vulnerabilities documented by Symantec as of 2007.[1] Their effect may range from a petty nuisance to a significant security risk,
depending on the sensitivity of the data handled by the vulnerable site and the nature of any security mitigation implemented by the site's owner.
<br/>
- <a href="https://en.wikipedia.org/wiki/Cross-site_scripting">Wikipedia</a>
</blockquote>
<br/>
<a class="section-header" href="/xss/reflected">Reflected</a>
<p>
    Reflected XSS comes directly from unfiltered user input and is executed immediately on the site.
</p>
<br/>
<a class="section-header" href="/xss/stored">Stored</a>
<p>
    Stored XSS vulnerabilities come from stored data, inserted into a datasource by a user.
</p>
<br/>
<a class="section-header" href="/xss/dom">DOM</a>
<p>
    DOM XSS is an injection purely on the client side, no server interaction.
</p>
<br/>
<a class="section-header" href="/xss/zend">Zend-Escaper</a>
<p>
    Example using the Zend-Escaper component
</p>

{% endblock %}
