<?php
namespace Listener\Ofweek\Extension;

use \Module\Jeyroik\Event as JRE;
use \Module\Jeyroik\Event\Interfaces as JREI;
use \Module\Ofweek\Core as OC;
use \Module\Ofweek\Core\View as OCV;

class Avatar extends JRE\Listener implements JREI\Listener
{
    use JRE\Injection;

    protected $_eventsMap = [
        'layout css files' => 'layoutCssFiles',
        'creator/header blocks' => 'creatorProfileHeader',
        'creator/profile/dashboard blocks' => 'creatorProfileDashboardBlocks'
    ];

    public static function getEvents()
    {
        return [
            'layout css files',
            'creator/header blocks',
            'creator/profile/dashboard blocks'
        ];
    }

    public function creatorProfileHeader($result, $context)
    {
        $header = $result->result['array'];

        $header['blocks'][] = new OCV\Extension(
            'avatar/profile/header',
            [
                'width'     => 2,
                'user'      => $context['user'],
                'basePath'  => OC\Image::$basePath
            ]);

        $header['width'] += 2;

        return $header;
    }

    public function creatorProfileDashboardBlocks($result, $context)
    {
        $header  = $result->result['array'];

        $header['blocks'][] = new OC\View\Extension(
            'avatar/profile/dashboard',
            [
                'width' => 3,
                'user'      => $context['user'],
                'basePath'  => OC\Image::$basePath
            ]);

        $header['width'] += 3;

        return $header;
    }

    /**
     * @param $result
     * @param array $context
     * @return array
     */
    public function layoutCssFiles($result, $context)
    {
        $request    = $this->event('get request params');
        $controller = $request['controller'];
        $action     = $request['action'];
        $result     = $result->result['array'];

        if($controller == OC\Data\Controller::CreatorProfileController
            && $action == OC\Data\Controller::CreatorProfileAction)
            $result['avatar/profile'] = OC\View::Extension;

        return $result;
    }
}