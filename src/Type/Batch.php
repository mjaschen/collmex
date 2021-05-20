<?php

declare( strict_types=1 );

namespace MarcusJaschen\Collmex\Type;

/**
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property string $type_identifier
 * @property string $client_id
 * @property string $batch_number
 * @property string $product_id
 * @property string $description
 */
class Batch extends AbstractType implements TypeInterface {
	/**
	 * @var array
	 */
	protected $template = [
		'type_identifier' => 'CMXBTC',
		'client_id'       => null,
		'batch_number'    => null,
		'product_id'      => null,
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
