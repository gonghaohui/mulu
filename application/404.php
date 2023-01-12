<?php
use think\Db;

$nowCategory = Db::name('article_category')
    ->where('category_url','script')
    ->where('status',1)
    ->where('pid',0)
    ->find();

print_r($nowCategory);
echo 404;

