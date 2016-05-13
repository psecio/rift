{% extends 'app.layout.php' %}

{% block content %}

<h3>File Upload</h3>

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
{{ file }}<br/>
{% endfor %}

{% endif %}

{% endblock %}
