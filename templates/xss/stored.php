{% extends 'app.layout.php' %}

{% block content %}

<h3>Cross-Site Scripting (XSS): Stored</h3>
<p>
    Stored XSS happens when user input is not correctly filtered and the value is put directly into the database.<br/>
    That value is then pulled out and used as-is later with no escaping.
</p>
<p>
    <b>Exploit:</b><br/>
    In the form below enter <code>&lt;script>alert(1);&lt;/script></code> for the <b>Name</b> value and click submit.
</p>

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/xss/stored" class="form">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title"/>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" rows="8" class="form-control" id="content"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="sub" value="Submit" class="btn"/>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <h2>Latest Posts</h2>

        {% for post in posts %}
            <b style="font-size:17px">{{ post.title }}</b> [<a href="/xss/delete/{{ post.id }}">X</a>]
            {{ post.create_date }}<br/>
            {{ post.content|raw }}
            <br/><br/>
        {% endfor %}
    </div>
</div>

{% endblock %}
