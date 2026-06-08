<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: 'SIPAMAS API',
    version: '1.0.0',
    description: 'Sistem Pelaporan Masyarakat – REST API Documentation. Gunakan JWT Bearer token untuk endpoint yang memerlukan autentikasi.',
    contact: new OA\Contact(email: 'admin@sipamas.id', name: 'SIPAMAS Support')
)]
#[OA\Server(
    url: 'http://localhost:8000',
    description: 'Local Development Server'
)]
#[OA\SecurityScheme(
    securityScheme: 'bearerAuth',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'JWT',
    description: 'Masukkan JWT token dari endpoint /api/login. Format: Bearer {token}'
)]
#[OA\Schema(
    schema: 'ReportResource',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Jalan Rusak di RT 05'),
        new OA\Property(property: 'region', type: 'string', example: 'Kec. Ciledug, Kota Tangerang'),
        new OA\Property(property: 'location', type: 'string', example: 'Jl. Mawar No. 10'),
        new OA\Property(property: 'description', type: 'string', example: 'Jalan berlubang cukup dalam dan membahayakan'),
        new OA\Property(property: 'evidence_photo', type: 'string', nullable: true, example: 'http://localhost:8000/storage/reports/foto.jpg'),
        new OA\Property(
            property: 'user',
            type: 'object',
            properties: [
                new OA\Property(property: 'id', type: 'integer', example: 1),
                new OA\Property(property: 'name', type: 'string', example: 'Budi Santoso'),
            ]
        ),
        new OA\Property(
            property: 'category',
            type: 'object',
            properties: [
                new OA\Property(property: 'id', type: 'integer', example: 1),
                new OA\Property(property: 'category_name', type: 'string', example: 'Infrastruktur'),
            ]
        ),
        new OA\Property(
            property: 'status',
            type: 'object',
            properties: [
                new OA\Property(property: 'id', type: 'integer', example: 1),
                new OA\Property(property: 'status_name', type: 'string', example: 'Menunggu Verifikasi'),
            ]
        ),
        new OA\Property(property: 'created_at', type: 'string', example: '2026-06-07T10:00:00.000000Z'),
        new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-07T10:00:00.000000Z'),
    ]
)]
class Annotations {}
