<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use OpenApi\Attributes as OA;

class ProfileController extends Controller
{
    #[OA\Get(
        path: '/api/profile',
        summary: 'Lihat profil pengguna yang sedang login',
        tags: ['Profile'],
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Data profil berhasil diambil',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(property: 'data', type: 'object', properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 1),
                            new OA\Property(property: 'name', type: 'string', example: 'Budi Santoso'),
                            new OA\Property(property: 'email', type: 'string', example: 'budi@example.com'),
                            new OA\Property(property: 'phone', type: 'string', example: '081234567890'),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-07T10:00:00.000000Z'),
                        ]),
                    ]
                )
            ),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function show()
    {
        $user = auth('api')->user();

        return response()->json([
            'status' => 'success',
            'data'   => [
                'id'         => $user->id,
                'name'       => $user->name,
                'email'      => $user->email,
                'phone'      => $user->phone,
                'created_at' => $user->created_at,
            ],
        ]);
    }

    #[OA\Put(
        path: '/api/profile',
        summary: 'Perbarui data profil pengguna',
        tags: ['Profile'],
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'Budi Santoso Updated'),
                    new OA\Property(property: 'email', type: 'string', format: 'email', example: 'budi.baru@example.com'),
                    new OA\Property(property: 'phone', type: 'string', example: '089876543210'),
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Profil berhasil diperbarui',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(property: 'message', type: 'string', example: 'Profil berhasil diperbarui'),
                        new OA\Property(property: 'data', type: 'object', properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 1),
                            new OA\Property(property: 'name', type: 'string', example: 'Budi Santoso Updated'),
                            new OA\Property(property: 'email', type: 'string', example: 'budi.baru@example.com'),
                            new OA\Property(property: 'phone', type: 'string', example: '089876543210'),
                        ]),
                    ]
                )
            ),
            new OA\Response(response: 422, description: 'Validasi gagal'),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function update(Request $request)
    {
        $user = auth('api')->user();

        $validator = Validator::make($request->all(), [
            'name'  => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'sometimes|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user->update($request->only('name', 'email', 'phone'));

        return response()->json([
            'status'  => 'success',
            'message' => 'Profil berhasil diperbarui',
            'data'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
            ],
        ]);
    }
}
