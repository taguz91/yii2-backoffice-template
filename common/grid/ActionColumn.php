<?php

namespace common\grid;

use Yii;
use yii\helpers\Html;

class ActionColumn extends \yii\grid\ActionColumn
{

  /**
   * @var string
   */
  public $header = 'Acciones';

  /**
   * @return void
   */
  protected function initDefaultButtons()
  {
    $this->initDefaultButton('view', 'far fa-eye text-primary');
    $this->initDefaultButton('update', 'far fa-edit text-primary');
    $this->initDefaultButton('delete', 'fas fa-trash text-danger', [
      'data-confirm' => Yii::t('yii', '¿Estas seguro de eliminarlo?'),
      'data-method' => 'post',
    ]);
  }

  /**
   * @return void
   *
   * @param string[] $additionalOptions
   */
  protected function initDefaultButton($name, $iconName, $additionalOptions = [])
  {
    if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
      $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions): string {
        switch ($name) {
          case 'view':
            $title = Yii::t('yii', 'View');
            break;
          case 'update':
            $title = Yii::t('yii', 'Update');
            break;
          case 'delete':
            $title = Yii::t('yii', 'Delete');
            break;
          default:
            $title = ucfirst($name);
        }
        $options = array_merge([
          'title' => $title,
          'aria-label' => $title,
          'data-pjax' => '0',
        ], $additionalOptions, $this->buttonOptions);
        $icon = Html::tag('i', '', ['class' => "$iconName mx-1"]);
        return Html::a($icon, $url, $options);
      };
    }
  }
}
