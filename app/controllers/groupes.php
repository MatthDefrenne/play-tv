<?php

/**
 * Controller used to display tv programs group page.
 *
 * @author PLAYMEDIA
 */
class groupes_controller extends ppl_app_controller
{
    /**
     * Display the program group page.
     *
     * @param string $type_alias  The program gender alias (type)
     * @param string $group_id    The program ID
     * @param string $group_alias The group alias
     */
    public function groupe_action($type_alias, $group_id, $group_alias)
    {
        switch ($type_alias) {
            case 'serie-tv':
            case 'tv-series':
                $type_id = 1;
                break;
            case 'films':
            case 'movie':
                $type_id = 2;
                break;
            case 'emission':
            case 'tv-show':
                $type_id = 3;
                break;
            case 'groupe':
            case 'group':
                break;
            default:
                return $this->createNotFoundResponse();
        }

        $group_infos = $this->getSdk()['services.group']->show($group_id);

        if (is_null($group_infos)) {
            return $this->createNotFoundResponse();
        }

        // Potential redirect
        if (!$this->isI18n() && urldecode($this->request->uri) !== $group_infos['url']) {
            return $this->response->redirect($group_infos['url'], 301);
        }

        if (!$this->isI18n() && $type_id === 1) {
            $this->set_page_title($group_infos['title'].' (série télé)');
        } else {
            $this->set_page_title($group_infos['title']);
        }
        $this->set_page_description(strip_tags($group_infos['summary']));

        $group_infos['summary'] = $this->getSdk()['utils.program']->summaryFormatted($group_infos['summary']);

        return $this->render(array(
            'group' => $group_infos,
            'videos' => $this->getSdk()['services.replay_tv']->getGroupVideos($group_id),
            'type_alias' => $type_alias,
        ));
    }
}
