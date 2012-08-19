<?php
/**
 * @var $this DocController
 * @var $items array
 * @var $packs
 */

echo CHtml::openTag('div', array('id' => 'search'));
echo CHtml::tag('input', array('type' => 'search', 'placeholder' => 'Search', 'results' => 10, 'id' => 'search-field', 'autocomplete' => 'off', 'autosave' => 'searchdoc'), '', false);
//echo CHtml::textField('search-field', '', array('id' => 'search-field'));
echo CHtml::closeTag('div');

echo CHtml::openTag('ul', array('id' => 'static-list'));
echo CHtml::tag('li', array('class' => 'category'), CHtml::tag('span', array(), 'TOC'));

echo CHtml::openTag('ul');
echo CHtml::tag('li', array('class' => 'sub'), CHtml::link('<span>Index</span><span class="desc">Yii API index page</span>', $this->createUrl('api', array('name' => 'index'))));
echo CHtml::closeTag('ul');

foreach( $packs as $packName=>$packItems ) {
    echo CHtml::tag('li', array('class' => 'category'), CHtml::tag('span', array(), $packName));
    if( $packItems ) {
        echo CHtml::openTag('ul');
        foreach($packItems as $packItem) {
            $title = CHtml::tag('span', array('class' => 'searchable'), $packItem);
            $description = CHtml::tag('span', array('class' => 'desc'), $this->getSectionDescription($packItem));
            $link = CHtml::link($title.' '.$description, $this->createUrl('api', array('name' => $packItem)));

            echo CHtml::tag('li', array('class' => 'sub'), $link);
        }
        echo CHtml::closeTag('ul');
    }
}
echo CHtml::closeTag('ul');
