{% extends 'app.layout.php' %}

{% block content %}

<h3>File Upload</h3>

<p>
    This is an example of how to safely handle file uploads in your application. There's a bit of error handling that comes along with it on the
    PHP side, so be sure to check out the controller.
</p>
<p>
    One thing to <b>absolutely</b> not do is to store the uploaded files some place that's web accessible. In our example below, we're using a
    "pass-through" script where we can control things like access level and prevent execution.
</p>

{% if message is defined %}
<div class="alert alert-danger">{{ message }}</div>
{% endif %}

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="upload">Select File</label>
        <input type="file" name="upload" class="form-control">
    </div>
    <input type="submit" name="sub" value="Submit" class="btn btn-success"/>
</form>

{% if maxupload is defined %}
<br>
<b>The maximum upload size is</b> {{ maxupload }}
{% endif %}

{% if files is defined %}
<br/><br/>
<h4>Files</h4>

{% for file in files %}
<a href="/upload/view?filename={{ file }}" target="_new">{{ file }}</a><br/>
{% endfor %}

{% endif %}

{% endblock %}
