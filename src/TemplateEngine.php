<?php

declare(strict_types=1);

namespace Wind\Telescope;

use Exception;
use Hyperf\View\Engine\EngineInterface;

class TemplateInstance
{
    protected $view_path = null;

    public function __construct($viewPath)
    {
        $this->view_path = $viewPath;
    }

    public function render($template, $data)
    {
        $loadFile = $this->view_path . $template . '.blade.php';
        if (!file_exists($loadFile)) {
            throw new Exception($loadFile . 'is not found');
        }

        return file_get_contents($loadFile);
    }
}

class TemplateEngine implements EngineInterface
{
    public function render($template, $data, $config): string
    {
        // 实例化对应的模板引擎的实例
        $engine = new TemplateInstance($config['view_path']);
        // 并调用对应的渲染方法
        return $engine->render($template, $data);
    }
}
