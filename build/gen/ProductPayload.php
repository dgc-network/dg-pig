<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product_payload.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>ProductPayload</code>
 */
class ProductPayload extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.ProductPayload.Action action = 1;</code>
     */
    protected $action = 0;
    /**
     * Approximately when transaction was submitted, as a Unix UTC
     * timestamp
     *
     * Generated from protobuf field <code>uint64 timestamp = 2;</code>
     */
    protected $timestamp = 0;
    /**
     * Generated from protobuf field <code>.ProductCreateAction product_create = 3;</code>
     */
    protected $product_create = null;
    /**
     * Generated from protobuf field <code>.ProductUpdateAction product_update = 4;</code>
     */
    protected $product_update = null;
    /**
     * Generated from protobuf field <code>.ProductDeleteAction product_delete = 5;</code>
     */
    protected $product_delete = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $action
     *     @type int|string $timestamp
     *           Approximately when transaction was submitted, as a Unix UTC
     *           timestamp
     *     @type \ProductCreateAction $product_create
     *     @type \ProductUpdateAction $product_update
     *     @type \ProductDeleteAction $product_delete
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\ProductPayload::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.ProductPayload.Action action = 1;</code>
     * @return int
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Generated from protobuf field <code>.ProductPayload.Action action = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setAction($var)
    {
        GPBUtil::checkEnum($var, \ProductPayload\Action::class);
        $this->action = $var;

        return $this;
    }

    /**
     * Approximately when transaction was submitted, as a Unix UTC
     * timestamp
     *
     * Generated from protobuf field <code>uint64 timestamp = 2;</code>
     * @return int|string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Approximately when transaction was submitted, as a Unix UTC
     * timestamp
     *
     * Generated from protobuf field <code>uint64 timestamp = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTimestamp($var)
    {
        GPBUtil::checkUint64($var);
        $this->timestamp = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.ProductCreateAction product_create = 3;</code>
     * @return \ProductCreateAction|null
     */
    public function getProductCreate()
    {
        return $this->product_create;
    }

    public function hasProductCreate()
    {
        return isset($this->product_create);
    }

    public function clearProductCreate()
    {
        unset($this->product_create);
    }

    /**
     * Generated from protobuf field <code>.ProductCreateAction product_create = 3;</code>
     * @param \ProductCreateAction $var
     * @return $this
     */
    public function setProductCreate($var)
    {
        GPBUtil::checkMessage($var, \ProductCreateAction::class);
        $this->product_create = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.ProductUpdateAction product_update = 4;</code>
     * @return \ProductUpdateAction|null
     */
    public function getProductUpdate()
    {
        return $this->product_update;
    }

    public function hasProductUpdate()
    {
        return isset($this->product_update);
    }

    public function clearProductUpdate()
    {
        unset($this->product_update);
    }

    /**
     * Generated from protobuf field <code>.ProductUpdateAction product_update = 4;</code>
     * @param \ProductUpdateAction $var
     * @return $this
     */
    public function setProductUpdate($var)
    {
        GPBUtil::checkMessage($var, \ProductUpdateAction::class);
        $this->product_update = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.ProductDeleteAction product_delete = 5;</code>
     * @return \ProductDeleteAction|null
     */
    public function getProductDelete()
    {
        return $this->product_delete;
    }

    public function hasProductDelete()
    {
        return isset($this->product_delete);
    }

    public function clearProductDelete()
    {
        unset($this->product_delete);
    }

    /**
     * Generated from protobuf field <code>.ProductDeleteAction product_delete = 5;</code>
     * @param \ProductDeleteAction $var
     * @return $this
     */
    public function setProductDelete($var)
    {
        GPBUtil::checkMessage($var, \ProductDeleteAction::class);
        $this->product_delete = $var;

        return $this;
    }

}

