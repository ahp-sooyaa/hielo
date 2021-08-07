<?php

function current_user()
{
    return auth()->user();
}

function active_url($segment, $name)
{
    return request()->segment($segment) == "$name" ? 'active' : '';
}
