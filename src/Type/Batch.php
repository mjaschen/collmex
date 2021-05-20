<?php

declare( strict_types=1 );

namespace MarcusJaschen\Collmex\Type;

/**
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property string $type_identifier
 * @property string $client_id
 * @property string $batch_number
 * @property string $free_text
 * @property string $changed_only
 * @property string $system_name
 */
class Batch extends AbstractType implements TypeInterface {
	/**
	 * @var array
	 */
	protected $template = [
		'type_identifier' => 'CMXBTC',
		'client_id'       => null,
		'batch_number'    => null,
		'product_number'  => null,
		// 5
		'description'     => null
	];

	/**
	 * Formally validates the type data in $data attribute.
	 *
	 * @return bool Validation success
	 */
	public function validate(): bool {
		return true;
	}
}
