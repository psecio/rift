{% extends 'app.layout.php' %}

{% block content %}

<h3>Login Flaws</h3>
<p>
    Login forms, if not written correctly, can leave you open to attacks right at your front door. Try to figure out what kind o vulnerabilties
    are in the following form.
</p>
<br/>

{% if success is defined %}
    {% if success == true %}
        {% set class = 'success' %}
    {% else %}
        {% set class = 'danger' %}
    {% endif %}
    <div class="alert alert-{{ class }}">{{ message }}</div>
{% endif %}

<div class="row">
    <div class="col-md-4">
    <form action="/auth/login" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <input type="submit" name="sub" value="Submit" class="btn btn-success"/>
    </form>
    </div>
</div>

{% endblock %}
