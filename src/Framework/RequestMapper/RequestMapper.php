<?php
declare(strict_types = 1);

namespace App\Framework\RequestMapper;

use Illuminate\Http\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class RequestMapper
 *
 * @package App\Framework\RequestMapper
 */
class RequestMapper
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * RequestMapper constructor.
     *
     * @param Request            $request
     * @param ValidatorInterface $validator
     */
    public function __construct(Request $request, ValidatorInterface $validator)
    {
        $this->request = $request;
        $this->validator = $validator;
    }

    /**
     * @param string $className
     *
     * @return mixed
     * @throws RequestMapperException
     */
    public function map(string $className)
    {
        $data = new $className($this->request);

        $errors = $this->validator->validate($data);
        if (\count($errors) > 0) {
            throw new RequestMapperException($errors);
        }

        return $data;
    }
}
