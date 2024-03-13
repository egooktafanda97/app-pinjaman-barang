<?php

namespace App\Services\Base;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BaseControllers
{
    private $view;
    private $ControllerClass;
    private $method;
    private $guards_request;
    private $request;
    public function __construct(Request $request)
    {
        $InitcontrollerName = ucfirst(Str::kebab($request->segment(1)) != "api" ? $request->segment(1) : $request->segment(2)) . 'Controller';
        $controllerName = str_replace('-', '', ucwords($InitcontrollerName, '-'));
        $controllerClass = "App\\Http\\Controllers\\$controllerName";
        $this->request = $request;
        $segment1 = $request->segment(1);
        $segment2 = $request->segment(2);
        if ($segment1 === 'api') {
            $this->guards_request = "api";
        } else {
            $this->guards_request = "web";
        }
        if (class_exists($controllerClass)) {
            if ($segment1 === 'api') {
                $this->view = "api." . (Str::kebab($segment2));
                $this->method =  Str::camel($request->segment(3)) ?: 'show';
                $this->request = $request->merge(['view' => $this->view, "guards_request" => "api"]);
            } else if ($segment1 != 'api') {
                $this->view = "pages.$segment1" . (!empty($segment2) ? ".$segment2" : ".show");
                $this->method =  Str::camel($request->segment(2)) ?: 'show';
                $this->request = $request->merge(['view' => $this->view, "guards_request" => "web"]);
            }
            $this->ControllerClass = $controllerClass;
        } else {
            $this->view = "pages." . $request->segment(1) . "." . ($request->segment(2) ?: "show");
        }
    }

    public function index(Request $request)
    {
        if (!empty($this->ControllerClass)) {
            if (method_exists($this->ControllerClass, $this->method)) {
                $segments = $request->segments();
                $arguments = array_slice($segments, 2);
                // return call_user_func_array([new $this->ControllerClass(), $this->method], [$request, ...$arguments]);
                return [$this->ControllerClass, $this->method];
                $result =  call_user_func_array([new $this->ControllerClass(), $this->method], []);

                if ($request->segment(1) != "api") {
                    if (method_exists($result, 'view')) {
                        return $result->view();
                    } else {
                        return $result;
                    }
                } else {
                    if (method_exists($result, 'view')) {
                        return $result->json();
                    } else {
                        return $result;
                    }
                }
            } else {
                return function (Request $request) {
                    return abort(404);
                };
            }
        }
        return ["App\Http\Controllers\BaseControllers", "show"];
    }
    public function getMergeRequest()
    {
        if (!empty($this->request->all()))
            return $this->request->all();
        $segment1 = $this->request->segment(1);
        $req = [
            'view' => "pages.$segment1.show", "guards_request" => $this->guards_request
        ];
        return $req;
    }
}
