<?php
/*
 * This file has been automatically generated by TDBM.
 * You can edit this file as it will not be overwritten.
 */

declare(strict_types=1);

namespace App\Infrastructure\Dao;

use App\Domain\Enum\ResetPasswordTokenEnum;
use App\Domain\Exception\InvalidValue;
use App\Domain\Exception\NotFound;
use App\Domain\Model\UpdateEmailToken;
use App\Domain\Model\User;
use App\Domain\Repository\EmailTokenRepository;
use App\Infrastructure\Config\EnvVarHelper;
use App\Infrastructure\Dao\Generated\AbstractUpdateEmailTokenDao;
use Firebase\JWT\JWT;
use TheCodingMachine\TDBM\TDBMService;
use UnexpectedValueException;
use function password_verify;
use function time;

/**
 * The UpdateEmailTokenDao class will maintain the persistence of UpdateEmailToken class into the email_tokens table.
 */
class UpdateEmailTokenDao extends AbstractUpdateEmailTokenDao implements EmailTokenRepository
{
    protected EnvVarHelper $envVarHelper;

    public function __construct(TDBMService $tdbmService, EnvVarHelper $envVarHelper)
    {
        parent::__construct($tdbmService);
        $this->envVarHelper = $envVarHelper;
    }

    public function findOneByUserId(string $id): ?UpdateEmailToken
    {
        return $this->findOne(['user_id' => $id]);
    }

    public function encodeToken(User $user, string $accessToken): string
    {
        return JWT::encode([
            'sub' => 'reset',
            'exp' => time() + (3600 * 48),
            'aud' => $user->getId(),
            'accessToken' => $accessToken,
        ], $this->envVarHelper->fetch(ResetPasswordTokenEnum::SECRET_ENV), ResetPasswordTokenEnum::ALGO);
    }

    /**
     * @throws InvalidValue
     * @throws NotFound
     */
    public function mustCheckValidToken(string $token): UpdateEmailToken
    {
        try {
            $decodedToken = JWT::decode($token, $this->envVarHelper->fetch(ResetPasswordTokenEnum::SECRET_ENV), [ResetPasswordTokenEnum::ALGO]);
            if (! isset($decodedToken->accessToken) || ! isset($decodedToken->aud)) {
                throw new NotFound(UpdateEmailToken::class, ['token' => $token]);
            }
            $emailToken = $this->mustFindOneByUserId($decodedToken->aud);

            if (! password_verify($decodedToken->accessToken, $emailToken->getAccessToken())) {
                throw new InvalidValue('Given access token is invalid');
            }
        } catch (UnexpectedValueException $e) {
            throw new NotFound(UpdateEmailToken::class, ['token' => $token], $e);
        }

        return $emailToken;
    }

    /**
     * @throws NotFound
     */
    public function mustFindOneByUserId(string $id): UpdateEmailToken
    {
        $emailToken = $this->findOne(['user_id' => $id]);
        if ($emailToken === null) {
            throw new NotFound(UpdateEmailToken::class, ['user' => $id]);
        }

        return $emailToken;
    }
}
