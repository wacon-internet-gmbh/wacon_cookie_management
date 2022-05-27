<?php
namespace Waconcookiemanagement\WaconCookieManagement\ViewHelpers;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class FALViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    public function initializeArguments()
    {
        $this->registerArgument('table', 'string', '', false);
        $this->registerArgument('field', 'string', '', true);
        $this->registerArgument('uid', 'integer', '', true);
    }
    public static function renderStatic( array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $table = $arguments['table'] != NULL ? $arguments['table'] : 'tt_content';
        $field = $arguments['field'];
        $uid = intval($arguments['uid']);

        $fileRepository = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\FileRepository::class);
        $fileObjects = $fileRepository->findByRelation($table, $field, $uid);

        return $fileObjects;
    }
}
