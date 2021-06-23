<?php


/**
 * Newsletter controller.
 */
class newsletter_controller extends ppl_app_controller
{
    /**
     * Unsubscribe a subcriber from a segment action.
     */
    public function unsubscribe_action()
    {
        $this->robots(false);
        $this->set_skin('light');

        if ('GET' === $this->request->method) {
            $inputData = $this->request->get;

            if (!isset($inputData['cipher'])) {
                return $this->createNotFoundResponse();
            }

            $parameters = array(
                'cipher' => $inputData['cipher'],
            );

            return $this->render($parameters);
        }

        $inputData = $this->request->post;

        if (!isset($inputData['cipher'])) {
            return $this->createNotFoundResponse();
        }

        $verification = $this->getSdk()->getApi()->mailing()->subscriberVerify(array(
            'cipher' => $inputData['cipher'],
        ));

        if (200 === $this->getSdk()->getApi()->getLastResponse()->getStatusCode()) {
            $this->getSdk()->getApi()->mailing()->segmentUnsubscribe(array(
                'segmentId' => $verification['segmentId'],
                'subscriberId' => $verification['subscriberId'],
            ));

            $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

            if (!$this->request->is_ajax && false === $this->isMobileLayout()) {
                $render_params = [];
                switch ($statusCode) {
                    case 204 :
                        $render_params['success'] = 'Vous avez été désinscrit de la newsletter.';
                        break;

                    default :
                        $render_params['errors'] = 'Une erreur est survenue. Veuillez réessayer un peu plus tard.';
                        break;
                }

                return $this->render($render_params);
            } else {
                switch ($statusCode) {
                    case 204 :
                        return $this->jsonResponse();
                        break;

                    default :
                        $errors = array(
                            'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                        );

                        return $this->badRequestJsonResponse($errors);
                        break;
                }
            }
        } else {
            $this->response->redirect("{$this->request->protocol}:{$this->hosts['current']}", 302);
        }
    }
}
