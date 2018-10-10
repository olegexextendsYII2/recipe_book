
<? require 'header.php'; ?>



<!DOCTYPE HTML>


<div class="back-top" id="back-top">
      <a href="/author_office" class="btn btn-block btn-lg btn-danger">добавить </a>
    </div>
     <div class="back-top" id="back-top">
      <a href="/" class="btn btn-block btn-lg btn-danger">рецепты</a>
    </div>
     <div class="back-top" id="back-top">
      <a href="/logout" class="btn btn-block btn-lg btn-danger">выйти</a>
    </div>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Контактная форма</title>
<style>
#feedback-form {
  max-width: 550px;
  padding: 2%;
  border-radius: 3px;
  background: #f1f1f1;
}
#feedback-form label {
  float: left;
  display: block;
  clear: right;
}
#feedback-form .w100 {
  float: right;
  max-width: 400px;
  width: 97%;
  margin-bottom: 1em;
  padding: 1.5%;
}
#feedback-form .border {
  border-radius: 1px;
  border-width: 1px;
  border-style: solid;
  border-color: #C0C0C0 #D9D9D9 #D9D9D9;
  box-shadow: 0 1px 1px rgba(255,255,255,.5), 0 1px 1px rgba(0,0,0,.1) inset;
}
#feedback-form .border:focus {
  outline: none;
  border-color: #abd9f1 #bfe3f7 #bfe3f7;
}
#feedback-form .border:hover {
  border-color: #7eb4ea #97cdea #97cdea;
}
#feedback-form .border:focus::-moz-placeholder {
  color: transparent;
}
#feedback-form .border:focus::-webkit-input-placeholder {
  color: transparent;
}
#feedback-form .border:not(:focus):not(:hover):valid {
  opacity: .8;
}
#submitFF {
  padding: 2%;
  border: none;
  border-radius: 3px;
  box-shadow: 0 0 0 1px rgba(0,0,0,.2) inset;
  background: #669acc;
  color: #fff;
}
#feedback-form br {
  height: 0;
  clear: both;
}
#submitFF:hover {
  background: #5c90c2;
}
#submitFF:focus {
  box-shadow: 0 1px 1px #fff, inset 0 1px 2px rgba(0,0,0,.8), inset 0 -1px 0 rgba(0,0,0,.05);
}
</style>


<form enctype="multipart/form-data" method="post" action="/add_recipe" id="feedback-form">
<label for="nameFF">название:</label>
<input type="text" name="title" required  class="w100 border">

<label for="messageFF">Сообщение:</label>
<textarea name="recipe"  required rows="5" placeholder="Детали заявки…" class="w100 border"></textarea>
<br>
 <input type="file" name="image" id="uploaded_file" >
 <br>
<input value="добавить" type="submit" >
</form>
<? require 'footer.php'; ?>