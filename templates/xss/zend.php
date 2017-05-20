{% extends 'app.layout.php' %}

{% block content %}

<h3>Using Zend-Escaper</h3>
<p>
    The <a href="https://docs.zendframework.com/zend-esscaper">Zend-Escaper component</a> is just one of
    many escaping libraries. It is used for on-the-spot escaping when a more universal escaping tool like
    the <a href="https://twig.sensiolabs.org/">Twig</a> templating library cannot.
</p>
<br/><br/>

<pre>
For HTML:
{{ content.html|raw }}
<br/>
For HTML attribute:
{{ content.htmlAttr|raw }}
<br/>
For Javascript:
{{ content.js|raw }}
<br/>
For CSS:
{{ content.css|raw }}
<br/>
For URLs:
{{ content.url|raw }}
</pre>
<br/><br>
<span style="font-size:11px">Source: <a href="https://framework.zend.com/blog/2017-05-16-zend-escaper.html">https://framework.zend.com/blog/2017-05-16-zend-escaper.html</a></span>
{% endblock %}