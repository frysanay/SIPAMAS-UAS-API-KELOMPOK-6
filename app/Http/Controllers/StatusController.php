<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use OpenApi\Attributes as OA;

class StatusController extends Controller
{
    #[OA\Get(
        path: '/api/statuses',
        summary: 'Daftar semua status laporan',
        tags: ['Status'],
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Daftar status berhasil diambil',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(
                            property: 'data',
                            type: 'array',
                            items: new OA\Items(
                                properties: [
                                    new OA\Property(property: 'id', type: 'integer', example: 1),
                                    new OA\Property(property: 'status_name', type: 'string', example: 'Menunggu Verifikasi'),
                                ]
                            )
                        ),
                    ]
                )
            ),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data'   => Status::select('id', 'status_name')->get(),
        ]);
    }

    #[OA\Get(
        path: '/api/reports/{id}/status',
        summary: 'Lihat status laporan berdasarkan ID laporan',
        tags: ['Status'],
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Status laporan berhasil diambil',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(property: 'data', type: 'object', properties: [
                            new OA\Property(property: 'report_id', type: 'integer', example: 1),
                            new OA\Property(property: 'title', type: 'string', example: 'Jalan Rusak di RT 05'),
                            new OA\Property(property: 'status', type: 'object', properties: [
                                new OA\Property(property: 'id', type: 'integer', example: 2),
                                new OA\Property(property: 'status_name', type: 'string', example: 'Diproses'),
                            ]),
                        ]),
                    ]
                )
            ),
            new OA\Response(response: 404, description: 'Laporan tidak ditemukan'),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function reportStatus($id)
    {
        $report = Report::with('status:id,status_name')->find($id);

        if (!$report) {
            return response()->json(['status' => 'error', 'message' => 'Laporan tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => [
                'report_id' => $report->id,
                'title'     => $report->title,
                'status'    => $report->status,
            ],
        ]);
    }
}
