{% extends 'app.layout.php' %}

{% block content %}

<h3>Cross-Site Scripting (XSS): Reflected</h3>
<p>
    Reflected XSS happens when user input is not correctly filtered and the value is used directly.
</p>
<p>
    <b>Exploit:</b><br/>
    On the URL above, append the value <code>?test=&lt;script>alert(1);&lt;/script></code> and see what happens.
</p>
{% if test %}
    <br/>
    <h4>Good job!</h4>
    <div class="output-div">
        <b>Escaped:</b> <code>{{ test }}</code>
        <br/><br/>
        <b>Raw:</b> {{ test|raw }}
    </div>
    <br/>
    <p>
        In PHP this kind of exploit can be (mostly) resolved by using something like <a href="http://php.net/htmlentities">htmlentities</a> or
        <a href="http://php.net/htmlspecialchars">htmlspecialchars</a> to escape the output. However, for a more site-wide solution a templating library
        like <a href="http://twig.sensiolabs.org/">Twig</a> is recommended.
    </p>
    <p>
        <b>Example:</b>
        <pre><code class="php">&lt;?php echo htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8'); ?></code></pre>
    </p>
{% endif %}

{% endblock %}
