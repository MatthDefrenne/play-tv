<?php

namespace PlayTv\Core\Normalizer;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Playmedia\Utils\Tool as Utils;
use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Component\Group as GroupComponent;
use Playmedia\Component\Program as ProgramComponent;
use PlayTv\Core\Replay;

class ReplayNormalizer extends BaseNormalizer
{
    private $urlGenerator;
    private $staticUrlGenerator;
    private $channelComponent;
    private $groupComponent;
    private $programComponent;

    public function __construct(UrlGeneratorInterface $urlGenerator, UrlGeneratorInterface $staticUrlGenerator, ChannelComponent $channelComponent, GroupComponent $groupComponent, ProgramComponent $programComponent)
    {
        $this->urlGenerator = $urlGenerator;
        $this->staticUrlGenerator = $staticUrlGenerator;
        $this->channelComponent = $channelComponent;
        $this->groupComponent = $groupComponent;
        $this->programComponent = $programComponent;

        parent::__construct(null, new CamelCaseToSnakeCaseNameConverter());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && $data instanceof Replay;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = parent::normalize($object, $format, $context);

        $data['replay_id'] = $object->id;
        $data['video_url'] = $object->url;

        $data['broadcast_date'] = $object->broadcastedAt;
        unset($data['broadcasted_at']);

        $data['expiration_date'] = $object->expiredAt;
        unset($data['expired_at']);

        $data['upload_date'] = $object->uploadedAt;
        unset($data['uploaded_at']);

        $data['alias'] = Utils::slugify($object->title);
        $data['duration'] = $this->formatDuration($object->length);
        $data['replay_page_url'] = $this->urlGenerator->generate('replay_replay', ['video_id' => $object->id, 'title' => $data['alias']]);
        $data['use_group'] = false;

        $data['channel'] = $this->channelComponent->show($object->channel);

        if (!empty($object->group)) {
            $data['group'] = $this->groupComponent->show($object->group);
        }

        if (!empty($object->program)) {
            $data['program'] = $this->programComponent->show($object->program);
        }

        $data['is_embed'] = !empty($object->embed) && $data['channel']['is_embed'];

        $images = [
            'small' => null,
            'medium' => null,
            'large' => null,
            'xlarge' => null,
            'source' => null,
        ];
        if (!empty($object->image)) {
            $imageDir = Utils::getImageDirectory($object->image);
            foreach (array_keys($images) as $format) {
                $images[$format] = $this->staticUrlGenerator->generate('program_image', [
                    'image_dir' => $imageDir,
                    'image_id' => $data['image'],
                    'format' => $format,
                ], UrlGeneratorInterface::ABSOLUTE_URL);
            }
        } elseif (!empty($data['program']) && !empty($data['program']['images'])) {
            $images = $data['program']['images'];
        } elseif (!empty($data['group']) && !empty($data['group']['images'])) {
            $images = $data['group']['images'];
        }
        $data['images'] = $images;

        return $data;
    }

    private function formatDuration($duration)
    {
        if (empty($duration)) {
            return;
        }

        $h = (int) floor($duration / 3600);
        $m = (int) floor(($duration % 3600) / 60);
        $s = (int) ($duration - ($h * 3600) - ($m * 60));

        $hours = $h > 0 ? $h.':' : '';
        $minutes = ($h > 0 && $m > 0 && $m < 10 ? '0' : '').($m > 0 ? $m : '00').':';
        $seconds = str_pad($s, 2, 0, STR_PAD_LEFT);

        return "{$hours}{$minutes}{$seconds}";
    }
}
