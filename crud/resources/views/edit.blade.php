<style>
body {
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
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
form {
    width: 35%;
}
h1{
    color: #4CAF50;
	font-size: 35px;
    -webkit-text-stroke: 1.5px black;
}
</style>
<center>
<br>
<h1>EDIT DATA</h1>

<br>
<form action="{{route('products.update', $products->id)}}" method="post">
@csrf
<input type="text" name="productName" class="form-control" value="{{$products->productname}}"><br><br>
<input type="text" name="productDes" class="form-control" value="{{$products->productdes}}"><br><br>
{{ Form::submit(trans('Update'), ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
<center>