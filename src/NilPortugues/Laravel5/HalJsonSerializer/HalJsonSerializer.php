<?php

/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 8/16/15
 * Time: 4:43 AM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Laravel5\HalJsonSerializer;

use ErrorException;
use Illuminate\Database\Eloquent\Model;
use NilPortugues\Api\HalJson\HalJsonTransformer;
use NilPortugues\Serializer\DeepCopySerializer;
use NilPortugues\Serializer\Drivers\Eloquent\EloquentDriver;
use ReflectionClass;
use ReflectionMethod;

/**
 * Class HalJsonSerializer.
 */
class HalJsonSerializer extends DeepCopySerializer
{
    /**
     * @param HalJsonTransformer $halJsonTransformer
     */
    public function __construct(HalJsonTransformer $halJsonTransformer)
    {
        parent::__construct($halJsonTransformer);
    }

    /**
     * Extract the data from an object.
     *
     * @param mixed $value
     *
     * @return array
     */
    protected function serializeObject($value)
    {

        $serialized = EloquentDriver::serialize($value);
        if ($value !== $serialized) {
            return $serialized;
        }

        return parent::serializeObject($value);
    }
}
