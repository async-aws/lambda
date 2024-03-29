<?php

namespace AsyncAws\Lambda\Exception;

use AsyncAws\Core\Exception\Http\ServerException;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Lambda received an unexpected Amazon EC2 client exception while setting up for the Lambda function.
 */
final class EC2UnexpectedException extends ServerException
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $ec2ErrorCode;

    public function getEc2ErrorCode(): ?string
    {
        return $this->ec2ErrorCode;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    protected function populateResult(ResponseInterface $response): void
    {
        $data = $response->toArray(false);

        $this->type = isset($data['Type']) ? (string) $data['Type'] : null;
        $this->ec2ErrorCode = isset($data['EC2ErrorCode']) ? (string) $data['EC2ErrorCode'] : null;
    }
}
