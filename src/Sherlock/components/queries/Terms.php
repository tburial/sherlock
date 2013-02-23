<?php
/**
 * User: Zachary Tong
 * Date: 2013-02-16
 * Time: 09:24 PM
 * Auto-generated by "generate.php"
 */
namespace Sherlock\components\queries;

use Sherlock\components;

/**
 * @method \Sherlock\components\queries\Terms field() field(\string $value)
 * @method \Sherlock\components\queries\Terms minimum_match() minimum_match(\int $value) Default: 2

 */
class Terms extends \Sherlock\components\BaseComponent implements \Sherlock\components\QueryInterface
{
    public function __construct($hashMap = null)
    {
        $this->params['minimum_match'] = 2;

        parent::__construct($hashMap);
    }

	/**
	 * @param  \string | array $terms,...
	 * @return Terms
	 */
	public function terms($terms)
	{

		$args = func_get_args();
		\Analog\Analog::log("Terms->Terms(".print_r($args, true).")", \Analog\Analog::DEBUG);

		//single param, array of filters
		if (count($args) == 1 && is_array($args[0]))
			$args = $args[0];

		foreach ($args as $arg) {
			if (is_string($arg))
				$this->params['terms'][] = $arg;
		}

		return $this;
	}


    public function toArray()
    {
        $ret = array (
  'terms' =>
  array (
      $this->params["field"] => $this->params["terms"],
      'minimum_match' => $this->params["minimum_match"],

  ),
);

        return $ret;
    }

}
