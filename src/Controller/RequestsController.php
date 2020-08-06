<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Wind\Telescope\Controller;

use Wind\Telescope\EntryType;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;

/**
 * @Controller()
 */
class RequestsController extends EntryController
{

    /**
     * The entry type for the controller.
     *
     * @return string
     */
    protected function entryType()
    {
        return EntryType::REQUEST;
    }

    /**
     * The watcher class for the controller.
     *
     * @return string
     */
    protected function watcher()
    {
        // return RequestWatcher::class;
        return null;
    }

    /**
     * @PostMapping(path="/telescope/telescope-api/requests")
     */
    public function list()
    {
        return $this->index();
    }

    /**
     * @GetMapping(path="/telescope/telescope-api/requests/{id}")
     */
    public function detail($id)
    {
        return $this->show($id);
    }
}
