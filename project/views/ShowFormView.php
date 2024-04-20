<h1>Профиль пользователя</h1>
<h2><?= $user['name'] ?></h2>
<h3><?= $user['email'] ?></h3>
<div><button><a href="/form/edit?id=<?= $user['id'] ?>">Изменить</a></button></div>
<div><button><a href="/form/delete?id=<?= $user['id'] ?>">Удалить</a></button></div>
<button><a href="/">Назад</a></button>