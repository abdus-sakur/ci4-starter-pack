<?php

function activeMenu($url)
{
    return service('uri')?->getSegment(1) == $url ? "active" : "";
}
