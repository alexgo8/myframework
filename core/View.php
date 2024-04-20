<?php

namespace core;

use core\PageContext;

class View
{
  public function render(PageContext $page)
  {
    return $this->renderLayout($page, $this->renderView($page));
  }
  private function renderLayout(PageContext $page, $view)
  {
    if ($page->layout) {
      $layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/project/layouts/{$page->layout}.php";
    }

    if (file_exists($layoutPath)) {
      ob_start();
      $title = $page->title;
      include $layoutPath;
      return ob_get_clean();
    } else {
      echo "Не найден файл с лейаутом по пути $layoutPath";
      die();
    }
  }
  private function renderView(PageContext $page)
  {
    if ($page->view) {
      $viewPath = $_SERVER['DOCUMENT_ROOT'] . "/project/views/{$page->view}.php";
    }
    if (file_exists($viewPath)) {
      ob_start();
      $data = $page->data;
      extract($data);
      include $viewPath;
      return ob_get_clean();
    } else {
      echo "Не найден файл с представлением по пути $viewPath";
      die();
    }
  }
}