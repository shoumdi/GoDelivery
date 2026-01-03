<?php

namespace APP\Utils;

class JWT
{

    /// algorithmes
    static string $HS256 = "HS256";

    static function encode(array $payload, string $secretkey, string $algo): string
    {
        $header64base = base64_encode(json_encode(['typ' => 'JWT', 'alg' => $algo]));
        $payload64base = base64_encode(json_encode($payload));

        $signature = self::createSignature(
            data: $header64base . '.' . $payload64base,
            key: $secretkey
        );
        $signature64base = base64_encode($signature);

        return $header64base . $payload64base . $signature64base;
    }

    static function decode(string $jwt, $secretkey)
    {
        list($header, $payload, $signature) = explode('.', $jwt);

        if ($signature != self::createSignature(data: $header . $payload, key: $secretkey)) return "";

        $data = json_decode(base64_decode($payload));
        if ($data->exp < time()) return "expired";

        return "valid";
    }

    private function createSignature(string $data, string $key)
    {
        return hash_hmac('sha256', $data, $key, true);
    }
    private function isSignatureValid($oldSignature,): bool
    {

        return true;
    }
}
