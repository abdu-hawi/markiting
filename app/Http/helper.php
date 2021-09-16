<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Gate;

if(!function_exists('check_gate')){
    function check_gate($ability){
        if (Gate::denies($ability)){
            abort(403);
        }
    }
    if(!function_exists('active_menu')){
        function active_menu($link): array{
            if (preg_match('/'.$link.'/i',Request::segment(2))){
                return ['active disabled' , 'menu-open' , 'display: block;'];
            }else{
                return ['','',''];
            }
        }
    }
}
