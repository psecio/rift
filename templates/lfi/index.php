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

{% if page is defined %}
    <h4>Page</h4>
    {{ page }}
{% endif %}

{% endblock %}
