<h3>Список пользователей</h3>
<?php
if (isset($data['users'])) {
  foreach ($data['users'] as $user) {
?>
    <div>
      <p><?= $user['id'] ?><a href="/form/show?id=<?= $user['id'] ?>"><?= ' ' . $user['name'] . ' ' ?></a><?= $user['email'] ?></p>
    </div>
<?php
  }
}
?>

<button><a href="/form/create">Добавить пользователя</a></button>