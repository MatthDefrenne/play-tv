<?php


/**
 * Controller used to display support pages.
 *
 * @author PLAYMEDIA
 */
class aide_controller extends ppl_app_controller
{
    /**
     * Redirect to faq page with http code 301.
     */
    public function index_action()
    {
        return $this->response->redirect('/faq/', 301);
    }

    /**
     * Display the "configuration" page.
     */
    public function config_action()
    {
        $this->set_page_title('Ma configuration système');

        return $this->render(array(
            'client_ip' => $this->request->client_ip,
            'client_country' => $this->request->get_client()->get_country_name(),
            'client_provider' => $this->request->get_client()->get_isp_name(),
            'client_parsed_ua' => $this->request->get_client()->get_parsed_ua(),
        ));
    }

    /**
     * Display the "support" page.
     */
    public function support_action()
    {
        // Render on GET request
        if ('GET' == $this->request->method) {
            $this->set_page_title($this->trans('help_support.title', [], 'seo'));

            return $this->render();
        }

        // Process on POST request
        $data = $this->request->post;

        $form = $this->getSdk()->getForm('Feedback\\SupportForm');
        $form->submit($data);

        if (!$form->isValid()) {
            return $this->badRequestJsonResponse($form->getErrors());
        }

        // raw
        $data = $form->getData();

        // additional
        $data['ipAddress'] = $this->request->client_ip;
        $data['countryId'] = $this->container['country_code'];
        $data['isp'] = $this->request->get_client()->get_isp_name();
        $data['app'] = 'Play TV';
        $data['flashVersion'] = ($this->request->post['flashVersion']) ?: null;

        $browser = $os = null;
        if (null !== $this->request->get_client()->get_parsed_ua()) {
            $browser = $this->request->get_client()->get_parsed_ua()->ua->toString();
            $os = $this->request->get_client()->get_parsed_ua()->os->toString();
        }
        $data['browser'] = $browser;
        $data['os'] = $os;

        $debug = null;
        if (isset($this->request->post['report']) && !empty(trim($this->request->post['report']))) {
            $report = $this->load('tvreport')->to_object($this->request->post['report']);
            $debug = $report->debug;
        }
        $data['debug'] = $debug;

        $this->getSdk()->getApi()->feedbacks()->create($data);
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 201 :
                $data = array('message' => '<strong>Message envoyé !</strong><br>Votre message a été bien envoyé au support.<br>Nous vous répondrons dès que possible.<br>Merci de votre compréhension.');

                return $this->jsonResponse($data);
                break;

            case 400 :
                return $this->badRequestJsonResponse($this->getSdk()->getApi()->getErrors());
                break;

            default :
                $errors = array(
                    'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                );

                return $this->badRequestJsonResponse($errors);
                break;
        }
    }
}
