<form method="post" action="/form/store">
  <input type="text" name="name" placeholder="Ваше имя" value="<?php if (isset($data['post']['name'])) {
  echo $data ['post']['name'];} ?>"><br>
  <input type="text" name="email" placeholder="Ваш email" value="<?php if (isset($data['post']['name'])) {
  echo $data['post']['email'];} ?>"><br>
  <input type="submit" value="Создать">
</form>

<?php
if (isset($data['errors'])) {
  foreach ($data['errors'] as $value) {
    echo '<pre>' . $value . '</pre>';
  }
}
?>
<button><a href="/">Назад</a></button>