<?php

namespace App\Auth\Infrastructure\Persistence\Token\JWT;

use App\Auth\Domain\Entities\Token;
use App\Auth\Domain\Entities\User;
use App\Auth\Domain\Repositories\TokenRepository;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

class JWTokenRepository implements TokenRepository
{
    public function __construct() {}

    public function create(User $user): Token
    {
        $expiresAt = now()->addDay()->getTimestamp();
        
        $token = JWT::encode(
            [
                'user_id' 		=> $user->id,
                'expires_at' 	=> $expiresAt
            ],
            file_get_contents(base_path('keys/private_rsa.key')),
            'RS256'
        );

		return new Token(
            $token,
            $expiresAt,
        );
    }

    public function decode(string $token): stdClass|null
    {
        try {
            $payload = JWT::decode(
                $token,
                new Key(file_get_contents(base_path('keys/public_rsa.key')), 'RS256')
            );
        } catch (Exception $e) {
            return null;
        }

        return $payload;
    }
}