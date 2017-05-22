{% extends 'app.layout.php' %}

{% block content %}

<h3>Poor Registration Flow</h3>
<p>
    When users register, it's easy to introduce flaws that could allow them to bypass authentication and authorization protections if
    you're not careful.<br/>
    Use the form below to register a new user:
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
    <form action="/auth/signup" method="POST">
        <div class="form-group">
            <label for="name">Enter Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="username">Enter Username:</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Enter Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <!-- <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" name="password_confirm" id="password_confirm" class="form-control">
        </div> -->
        <input type="submit" name="sub" value="Submit" class="btn btn-success"/>
    </form>
    </div>
</div>

{% endblock %}
