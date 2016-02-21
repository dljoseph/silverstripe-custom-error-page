<?php

/**
 * Class ErrorPageExtension
 *
 * @author Darren-Lee Joseph <darrenleejoseph@gmail.com>
 * @package customerrorpage
 */
class ErrorPageExtension extends DataExtension
{

    // Augments the error page with an additional dropdown field
    // for selecting a template to render with.

    private static $db = array(
        'CustomTemplate' => 'Varchar(64)'
    );


    public function updateCMSFields(FieldList $fields)
    {
        $templateDropdownField = DropdownField::create(
            'CustomTemplate',
            _t('CustomErrorPage.CUSTOMTEMPLATE', 'Template to render with'),
            self::get_top_level_templates()
        );

        $templateDropdownField->setEmptyString(_t('CustomErrorPage.DEFAULTTEMPLATE', '(Use default template)'));

        $fields->addFieldToTab('Root.Main', $templateDropdownField, 'Content');
    }


    /**
     * This function returns an array of top-level theme templates
     * @return array
     */
    public static function get_top_level_templates()
    {
        $ss_templates_array = array(); //initialise empty array
        $current_theme_path = THEMES_PATH . DIRECTORY_SEPARATOR . Config::inst()->get('SSViewer', 'theme');

        //theme directories to search
        $search_dir_array = array(
            $current_theme_path   . DIRECTORY_SEPARATOR . 'templates'
            //$current_theme_path   .'/templates/Layout' //we only want top level templates
        );

        foreach ($search_dir_array as $directory) {

            //Get all the SS templates in the directory
            foreach (glob("{$directory}" . DIRECTORY_SEPARATOR . "*.ss") as $template_path) {

                //get the template name from the path excluding the ".ss" extension
                $template = basename($template_path, '.ss');

                //Add the key=>value pair to the ss_template_array
                $ss_templates_array[$template] = $template;
            }
        }

        return $ss_templates_array;
    }//end get_top_level_templates()
}


/**
 * Class ErrorPage_ControllerExtension
 *
 * @author Darren-Lee Joseph <darrenleejoseph@gmail.com>
 * @package customerrorpage
 */
class ErrorPage_ControllerExtension extends Extension
{

    /**
     * @throws SS_HTTPResponse_Exception
     * @return SS_HTTPResponse
     */

    public function onAfterInit()
    {
        $this->owner->templates['index'] = array($this->owner->dataRecord->CustomTemplate, 'Page');
    }
}//end class ErrorPage_ControllerExtension

