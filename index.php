<?php

namespace index\lib;
error_reporting(1);
include "url.php";

echo '<h3>url() : </h3>';
var_dump(\lib\url::make_url());

echo '<h3>full() : </h3>';
var_dump(\lib\url::full());

echo '<h3>path() : </h3>';
var_dump(\lib\url::path());

echo '<h3>base() : </h3>';
var_dump(\lib\url::base());

echo '<h3>dir() : </h3>';
var_dump(\lib\url::dir());
var_dump(\lib\url::dir(0));
var_dump(\lib\url::dir(1));
var_dump(\lib\url::dir(2));

echo '<h3>protocol() : </h3>';
var_dump(\lib\url::protocol());

echo '<h3>host() : </h3>';
var_dump(\lib\url::host());

echo '<h3>sub_domain() : </h3>';
var_dump(\lib\url::sub_domain());

echo '<h3>domain() : </h3>';
var_dump(\lib\url::domain());

echo '<h3>root() : </h3>';
var_dump(\lib\url::root());

echo '<h3>tld() : </h3>';
var_dump(\lib\url::tld());

echo '<h3>port() : </h3>';
var_dump(\lib\url::port());

echo '<h3>lang() : </h3>';
var_dump(\lib\url::lang());

echo '<h3>content() : </h3>';
var_dump(\lib\url::content());

echo '<h3>module() : </h3>';
var_dump(\lib\url::module());

echo '<h3>child() : </h3>';
var_dump(\lib\url::child());

echo '<h3>property() : </h3>';
var_dump(\lib\url::property());
var_dump(\lib\url::property("sa"));
var_dump(\lib\url::property("ch"));

echo '<h3>query() : </h3>';
var_dump(\lib\url::query());
var_dump(\lib\url::query("run"));
var_dump(\lib\url::query("ex"));