{% extends 'app.layout.php' %}

{% block content %}

<h3>Local File Include (LFI)</h3>

<blockquote style="font-size:13px">
Local File Inclusion (LFI) is similar to a Remote File Inclusion vulnerability except instead of including remote files, only local
files i.e. files on the current server can be included. The vulnerability is also due to the use of user-supplied input without
proper validation.
<br/>
- <a href="https://en.wikipedia.org/wiki/File_inclusion_vulnerability#Local_File_Inclusion">Wikipedia</a>
</blockquote>

<h4>Files</h4>
<ul>
{% for name,file in files %}
    <li><a href="/lfi?page={{ name }}">{{ name }}</a></li>
{% endfor %}
</ul>

{% if isInjection is defined %}
<hr/>
<h4>Good Job!</h4>
<p>
    You figured out that you can put a local file path as the <code>page</code> value on the URL and get it to include the contents in the page.
    You can access any file that allows read access to the web server user - which is usually a lot of things on the server including:

    <ul>
        <li>Server configuration files (like <code>/etc/passwd</code>)</li>
        <li>Website code</li>
        <li>Files from <code>/tmp</code> that includes unencrypted session information</li>
    </ul>

    Try this one out and see what it shows: <code>../../../../../../etc/passwd</code>
</p>
<br/>
<h4>Prevention</h4>
<p>
    This kind of attack relies on the lack of validation on the path being passed in. So, to prevent it, you need to be sure the file
    is in the right directory and that it can be accessed.

    In our case we're just using an <code>include_once</code> on the path given. We can add in a check using <a href="http://php.net/realapth">realpath</a>
    to be sure it's resolving to the right place:
<pre><code class="php">&lt;?php
$path = realpath('../data/pages/'.$_GET['page']);
$allowed = realpath('../data/pages');

// See if the first part of the real path matches our allowed
if (substr($path, 0, strlen($allowed)) !== $allowed) {
    include_once($path);
}
?></code></pre>
</p>
<p>
    You can also use a setting in the `php.ini` to prevent the opening of files outside a certain directory:
<pre><code>open_basedir = "/var/www/phparch"</code></pre>
</p>
<hr/>
{% endif %}

{% if page is defined %}
    <h4>Page</h4>
    {{ page }}
{% endif %}

{% endblock %}
