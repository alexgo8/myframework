<p>
  Это страница Тест
</p>

<?php
foreach ($data as $value) {
  echo '<pre>' . $value['size'] . ' цена: ' . $value['price'] . ' руб.' . '</pre>';   
}
?>