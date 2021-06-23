<?php

use Symfony\Component\HttpKernel\Exception\FlattenException;

/**
 * Controller used to display http exceptions, mainly 40*.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class errors_controller extends ppl_app_controller
{
    public function before_action()
    {
        parent::before_action();

        $this->robots(false);
    }

    public function exception_action(FlattenException $exception)
    {
        if ('json' === $this->request->getRequestFormat()) {
            return $this->jsonResponse(
                ['message' => $exception->getMessage()],
                $exception->getStatusCode()
            );
        }

        switch ($exception->getStatusCode()) {
            case 404:
                return $this->forward('errors', 'not_found');
                break;
            case 410:
                return $this->forward('errors', 'gone');
                break;
        }
    }

    public function not_found_action()
    {
        $message = $this->trans('Page not found', [], 'errors');

        if ($this->request->is_ajax) {
            return $this->jsonResponse($message, 404);
        }

        $this->response->set_status(404);
        $this->set_page_title($message);

        return $this->render();
    }

    public function gone_action()
    {
        $message = $this->trans('Page not found', [], 'errors');

        if ($this->request->is_ajax) {
            return $this->jsonResponse($message, 410);
        }

        $this->response->set_status(410);
        $this->set_page_title($message);

        return $this->render();
    }
}
