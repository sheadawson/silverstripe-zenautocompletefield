<?php
/**
 * Zen AutoCompleteField.
 * @package Zen
 * @author shea@silverstripe.com.au
 * @license BSD License http://silverstripe.org/bsd-license/
 */
class ZenAutoCompleteField extends TextField
{
    

    /**
     * @var array
     */
    protected $suggestions;


    public function __construct($name, $title = null, $value = "", $maxLength = null, $form = null)
    {
        parent::__construct($name, $title, $value, $form);
        $this->addExtraClass('zenautocompletefield text');

        Requirements::css(THIRDPARTY_DIR . '/jquery-ui-themes/smoothness/jquery-ui.css');
        Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
        Requirements::javascript(THIRDPARTY_DIR . '/jquery-entwine/dist/jquery.entwine-dist.js');
        Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery-ui.js');
        Requirements::javascript('zenautocompletefield/javascript/zenautocompletefield.js');
    }

    
    /**
     * @param array
     */
    public function setSuggestions(array $suggestions)
    {
        $this->suggestions = $suggestions;
        return $this;
    }


    /**
     * @return array
     */
    public function getAttributes()
    {
        return array_merge(
            parent::getAttributes(),
            array(
                'data-suggestions' => json_encode($this->suggestions)
            )
        );
    }
}
