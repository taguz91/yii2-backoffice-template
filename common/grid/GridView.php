<?php

namespace common\grid;

use Yii;
use yii\grid\GridView as BaseGridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class GridView extends BaseGridView
{

  /**
   * @var string[]
   *
   * @psalm-var array{class: string}
   */
  public $tableOptions = ['class' => 'table table-striped table-hover'];

  /**
   * @var string
   */
  public $emptyText = 'No encontramos resultados';

  /**
   * Renders the table header.
   * @return string the rendering result.
   */
  public function renderTableHeader()
  {
    $cells = [];
    foreach ($this->columns as $column) {
      /* @var $column Column */
      $cells[] = $column->renderHeaderCell();
    }
    $content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);
    if ($this->filterPosition === self::FILTER_POS_HEADER) {
      $content = $this->renderFilters() . $content;
    } elseif ($this->filterPosition === self::FILTER_POS_BODY) {
      $content .= $this->renderFilters();
    }

    return "<thead class=\"thead-dark\">\n" . $content . "\n</thead>";
  }

  /**
   * Renders the summary text.
   *
   * @return string
   */
  public function renderSummary()
  {
    $count = $this->dataProvider->getCount();
    if ($count <= 0) {
      return '';
    }
    $summaryOptions = $this->summaryOptions;
    $tag = ArrayHelper::remove($summaryOptions, 'tag', 'div');
    if (($pagination = $this->dataProvider->getPagination()) !== false) {
      $totalCount = $this->dataProvider->getTotalCount();
      $begin = $pagination->getPage() * $pagination->pageSize + 1;
      $end = $begin + $count - 1;
      if ($begin > $end) {
        $begin = $end;
      }
      $page = $pagination->getPage() + 1;
      $pageCount = $pagination->pageCount;
      if (($summaryContent = $this->summary) === null) {
        return Html::tag($tag, Yii::t('yii', 'Mostrando <b>{begin, number}-{end, number}</b> de <b>{totalCount, number}</b> {totalCount, plural, one{registro} other{registros}}.', [
          'begin' => $begin,
          'end' => $end,
          'count' => $count,
          'totalCount' => $totalCount,
          'page' => $page,
          'pageCount' => $pageCount,
        ]), $summaryOptions);
      }
    } else {
      $begin = $page = $pageCount = 1;
      $end = $totalCount = $count;
      if (($summaryContent = $this->summary) === null) {
        return Html::tag($tag, Yii::t('yii', 'Total <b>{count, number}</b> {count, plural, one{registro} other{registros}}.', [
          'begin' => $begin,
          'end' => $end,
          'count' => $count,
          'totalCount' => $totalCount,
          'page' => $page,
          'pageCount' => $pageCount,
        ]), $summaryOptions);
      }
    }

    return Yii::$app->getI18n()->format($summaryContent, [
      'begin' => $begin,
      'end' => $end,
      'count' => $count,
      'totalCount' => $totalCount,
      'page' => $page,
      'pageCount' => $pageCount,
    ], Yii::$app->language);
  }

  /**
   * Renders the pager.
   * @return string the rendering result
   */
  public function renderPager()
  {
    $pagination = $this->dataProvider->getPagination();
    if ($pagination === false || $this->dataProvider->getCount() <= 0) {
      return '';
    }
    /* @var $class LinkPager */
    $pager = $this->pager;
    $class = ArrayHelper::remove($pager, 'class', LinkPager::class);
    $pager['pagination'] = $pagination;
    $pager['view'] = $this->getView();

    return $class::widget($pager);
  }
}
