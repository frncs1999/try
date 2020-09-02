<html>
<head>
<style>
body {
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
th {
    padding: 30px;
    font-size: 20px;
}
table {
    text-align: center;
}
#name {
    font-size: 16px;
}
#des {
    font-size: 16px;
}
.btn {
    display:table-cell;
}
input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
.column {
  float: left;
}
.left {
  width: 30%;
  padding-top: 50px;
  padding-left: 100px;
}
.right {
  width: 60%;
}
h1{
    color: #4CAF50;
	font-size: 40px;
    -webkit-text-stroke: 1.5px black;
}
h2{
    color: #4CAF50;
    font-size: 35px;
    -webkit-text-stroke: 1.5px black;
}
input[type=text] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  display: inline-block;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
</style>
</head>
<body>
<center>
<br>
<h1>SIMPLE CRUD</h1>

<div class="row">
<div class="column left">
<h2>ADD DATA</h2>
{{ Form::model(null, ['url'=> route('products.add'), 'method' => 'POST']) }}
{{ Form::text('productName', null, ['class' => 'form-control', 'placeholder' => 'Product Name']) }} <br><br>
{{ Form::text('productDes', null, ['class' => 'form-control', 'placeholder' => 'Product Description']) }} <br><br>
{{ Form::submit(trans('Submit Button'), ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
</div>
<div class="column right">
<br>
<table border=0>
    <tr style="padding:5px;">
        <th>Product Name</th>
        <th>Product Description</th>
        <th colspan="2">Options</th>
    </tr>
    @foreach($products as $p)
        <tr>
            
            <td id="name">{{ $p->productname }}</td>
            <td id="des">{{ $p->productdes }}</td>
            <td class="btn">
                {{ Form::model(null, ['url'=> route('products.edit', $p->id), 'method' => 'GET']) }}    
                {{ Form::submit(trans('Edit'), ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </td>
            <td class="btn">
                {{ Form::model(null, ['url'=> route('products.delete', $p->id), 'method' => 'GET']) }}    
                {{ Form::submit(trans('Delete'), ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
</table>
</div>
</div>
</center>
</body>
</html>