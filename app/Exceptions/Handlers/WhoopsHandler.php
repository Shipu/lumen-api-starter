<?php

namespace App\Exceptions\Handlers;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

class WhoopsHandler extends BaseHandler
{
    /**
     * Handle the exception.
     *
     * @return mixed
     */
    public function handle()
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        return $whoops->handleException($this->exception);
    }

    /**
     * @inheritDoc
     */
    protected function isCatchable()
    {
        return app('config')->get('app.debug') && (! $this->isApiRequest() || $this->isFatalError());
    }

    /**
     * Check if the exception is a fatal error.
     *
     * @return boolean
     */
    private function isFatalError()
    {
        return $this->exception->getStatusCode() >= 500;
    }
}
