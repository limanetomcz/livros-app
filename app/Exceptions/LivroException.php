<?php

namespace App\Exceptions;

use Exception;

class LivroException extends Exception
{
    protected $livroId;
    protected $operation;

    /**
     * Construtor customizado para LivroException
     *
     * @param string $message
     * @param string|null $operation
     * @param int|null $livroId
     * @param \Throwable|null $previous
     */
    public function __construct(string $message, ?string $operation = null, ?int $livroId = null, \Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
        $this->operation = $operation;
        $this->livroId = $livroId;
    }

    /**
     *
     * @return int|null
     */
    public function getLivroId(): ?int
    {
        return $this->livroId;
    }

    /**
     *
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }

    /**
     *
     * @return string
     */
    public function getDetailedMessage(): string
    {
        $baseMessage = $this->getMessage();
        $operationPart = $this->operation ? " durante a operação '$this->operation'" : '';
        $livroPart = $this->livroId ? " para o livro com ID $this->livroId" : '';

        return $baseMessage . $operationPart . $livroPart;
    }
}
