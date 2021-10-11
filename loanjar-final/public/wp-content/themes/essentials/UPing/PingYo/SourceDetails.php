<?php
namespace PingYo;

class SourceDetails
{
    public $Address;
    public $ClientUserAgent;
    public $CreationUrl;
    public $ReferringUrl;
    public $LanguageCodes;

    private $logger = null;

    private $validation_rules = [
        'required' => [
            [['Address', 'ClientUserAgent', 'CreationUrl', 'ReferringUrl']]
        ],
        'array' => [
            [['LanguageCodes']]
        ],
        'url' => [
            [['CreationUrl', 'ReferringUrl']]
        ]
    ];

    public function attachLogger(\Psr\Log\LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("SourceDetails::toJson() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return json_encode($this->toArray());
        }
    }

    public function validate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("SourceDetails::validate() called");
        }
        $validator = new ExtendedValidator(array(
                'Address' => $this->Address,
                'ClientUserAgent' => $this->ClientUserAgent,
                'CreationUrl' => $this->CreationUrl,
                'ReferringUrl' => $this->ReferringUrl,
            ));
        $validator->rules($this->validation_rules);
        if ($validator->validate()) {
            if (!is_null($this->logger)) {
                $this->logger->info("SourceDetails validation passed");
            }
            return true;
        } else {
            if (!is_null($this->logger)) {
                $this->logger->warning("SourceDetails validation errors found: ",
                    array('errors' => $validator->errors()));
            }
            return $validator->errors();
        }
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("SourceDetails::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return [
                'Address' => $this->Address,
                'ClientUserAgent' => $this->ClientUserAgent,
                'CreationUrl' => $this->CreationUrl,
                'ReferringUrl' => $this->ReferringUrl,
            ];
        }
    }

}
