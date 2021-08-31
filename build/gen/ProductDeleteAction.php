<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product_payload.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>ProductDeleteAction</code>
 */
class ProductDeleteAction extends \Google\Protobuf\Internal\Message
{
    /**
     * product_type and product_id are used in deriving the state address
     *
     * Generated from protobuf field <code>.Product.ProductType product_type = 1;</code>
     */
    protected $product_type = 0;
    /**
     * Generated from protobuf field <code>string product_id = 2;</code>
     */
    protected $product_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $product_type
     *           product_type and product_id are used in deriving the state address
     *     @type string $product_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\ProductPayload::initOnce();
        parent::__construct($data);
    }

    /**
     * product_type and product_id are used in deriving the state address
     *
     * Generated from protobuf field <code>.Product.ProductType product_type = 1;</code>
     * @return int
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * product_type and product_id are used in deriving the state address
     *
     * Generated from protobuf field <code>.Product.ProductType product_type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setProductType($var)
    {
        GPBUtil::checkEnum($var, \Product\ProductType::class);
        $this->product_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string product_id = 2;</code>
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Generated from protobuf field <code>string product_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setProductId($var)
    {
        GPBUtil::checkString($var, True);
        $this->product_id = $var;

        return $this;
    }

}
