<form method="post" action="/form/update">
  <input type="text" name="name" placeholder="Ваше имя" value="<?php if (isset($user['name'])) {echo $user['name'];}?>"><br>
  <input type="text" name="email" placeholder="Ваш email" value="<?php if (isset($user['email'])) {echo $user['email'];}?>"><br>
  <input type="hidden" name="param" value="<?php if (isset($user['id'])) {echo $user['id'];} elseif ($_POST['param']) {echo $_POST['param'];}?>">
  <input type="submit" value="Изменить">
</form>
<div><button><a href="/form/show?id=<?php if (isset($user['id'])) {echo $user['id'];} elseif ($_POST['param']) {echo $_POST['param'];} ?>">Отмена</a></button></div>
<?php
if (isset($data['errors'])) {
  foreach ($data['errors'] as $value) {
    echo '<pre>' . $value . '</pre>';
  }
}
?>