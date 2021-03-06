<?php
/**
 * Class Containers
 *
 * @filesource   Containers.php
 * @created      12.10.2015
 * @package      chillerlan\bbcode\Modules\Html5
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2015 Smiley
 * @license      MIT
 */

namespace chillerlan\bbcode\Modules\Html5;

use chillerlan\bbcode\Modules\ModuleInterface;

/**
 * Transforms several container tags into HTML5
 */
class Containers extends Html5BaseModule implements ModuleInterface{

	/**
	 * An array of tags the module is able to process
	 * @todo flex, inline?
	 *
	 * @var array
	 * @see \chillerlan\bbcode\Modules\Tagmap::$tags
	 */
	protected $tags = ['p', 'div', 'left', 'right', 'center'];

	/**
	 * Transforms the bbcode, called from BaseModuleInterface
	 *
	 * @return string a transformed snippet
	 * @see \chillerlan\bbcode\Modules\BaseModuleInterface::transform()
	 * @internal
	 */
	public function __transform(){
		if(empty($this->content)){
			return '';
		}

		$tag = $this->tagIn(['p', 'div'], 'p');

		$align = $this->tagIn($this->_text_align, '');
		if(!$align){
			$align = $this->attributeIn('align', $this->_text_align, 'left');
		}

		$this->_style = [
			'text-align' => $align,
		];

		return '<'.$tag.$this->get_title().$this->get_css_class().$this->get_style().'>'.$this->content.'</'.$tag.'>';
	}

}
