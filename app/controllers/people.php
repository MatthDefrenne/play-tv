<?php

/**
 * Controller used to display pages about people (casting).
 *
 * @author PLAYMEDIA
 */
class people_controller extends ppl_app_controller
{
    /**
     * Display informations about a person.
     *
     * @param string $cast_id    The cast ID
     * @param string $cast_alias The cast alias
     *
     * @TODOS HTTP CACHE 1 HOUR
     */
    public function index_action($cast_id, $cast_alias)
    {
        $infos = $this->getSdk()['services.casting']->show($cast_id);

        if (is_null($infos)) {
            return $this->createNotFoundResponse();
        }

        $infos['statuses'] = $this->getSdk()['services.casting']->getStatus($cast_id);

        $slug = $this->getSdk()['utils.tool']->slugify($infos['fullname']);
        if ($slug !== $cast_alias) {
            return $this->response->redirect(sprintf('/people/%d/%s/', $cast_id, $slug), 301);
        }

        $this->set_page_title($infos['fullname']);

        return $this->render(array(
            'infos' => $infos,
            'previous_broadcasts' => $this->getSdk()['services.casting']->getCastPreviousBroadcasts($cast_id),
            'next_broadcasts' => $this->getSdk()['services.casting']->getCastNextBroadcasts($cast_id),
        ));
    }
}
